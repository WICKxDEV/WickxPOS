<?php

namespace App\Services;

use App\Classes\Hook;
use App\Classes\Schema;
use App\Events\AfterHardResetEvent;
use App\Events\BeforeHardResetEvent;
use App\Models\Customer;
use App\Models\Option;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class ResetService
{
    public function softReset()
    {
        $tables = Hook::filter( 'ns-wipeable-tables', [
            'wickxpos_coupons',
            'wickxpos_coupons_products',
            'wickxpos_coupons_categories',
            'wickxpos_coupons_customers',
            'wickxpos_coupons_customers_groups',

            'wickxpos_customers_account_history',
            'wickxpos_customers_addresses',
            'wickxpos_customers_coupons',
            'wickxpos_customers_groups',
            'wickxpos_customers_rewards',

            'wickxpos_dashboard_days',
            'wickxpos_dashboard_weeks',
            'wickxpos_dashboard_months',

            'wickxpos_transactions',
            'wickxpos_transactions_accounts',
            'wickxpos_transactions_histories',
            'wickxpos_transactions_balance_days',
            'wickxpos_transactions_balance_months',
            'wickxpos_transactions_actions_rules',

            'wickxpos_medias',
            'wickxpos_notifications',

            'wickxpos_orders',
            'wickxpos_orders_addresses',
            'wickxpos_orders_count',
            'wickxpos_orders_coupons',
            'wickxpos_orders_metas',
            'wickxpos_orders_payments',
            'wickxpos_orders_products',
            'wickxpos_orders_products_refunds',
            'wickxpos_orders_refunds',
            'wickxpos_orders_storage',
            'wickxpos_orders_taxes',

            'wickxpos_procurements',
            'wickxpos_procurements_products',

            'wickxpos_products',
            'wickxpos_products_categories',
            'wickxpos_products_histories',
            'wickxpos_products_histories_combined',
            'wickxpos_products_galleries',
            'wickxpos_products_metas',
            'wickxpos_products_taxes',
            'wickxpos_products_unit_quantities',

            'wickxpos_payments_types',

            'wickxpos_providers',

            'wickxpos_registers',
            'wickxpos_registers_history',

            'wickxpos_rewards_system',
            'wickxpos_rewards_system_rules',

            'wickxpos_taxes',
            'wickxpos_taxes_groups',

            'wickxpos_units',
            'wickxpos_units_groups',
        ] );

        foreach ( $tables as $table ) {
            if ( Hook::filter( 'ns-reset-table', $table ) !== false && Schema::hasTable( Hook::filter( 'ns-reset-table', $table ) ) ) {
                DB::table( Hook::filter( 'ns-table-name', $table ) )->truncate();
            }
        }

        /**
         * @var CustomerService $customerService
         */
        $customerService = app()->make( CustomerService::class );

        /**
         * Customers stills needs to be cleared
         * so we'll remove them manually.
         */
        Customer::get()->each( fn( $customer ) => $customerService->delete( $customer ) );

        /**
         * We'll delete all options where key starts with "ns_"
         * as this is a reserved key for the system, we can safely delete it
         * but excluding some options provided in an array
         */
        Option::where( 'key', 'LIKE', 'ns\_%' )
            ->where( 'key', 'NOT LIKE', 'ns\_pa_%' )
            ->where( 'key', 'NOT LIKE', 'ns\_gastro_%' )
            ->where( 'key', 'NOT LIKE', 'ns\_sms_%' )
            ->where( 'key', 'NOT LIKE', 'ns\_email_%' )
            ->where( 'key', 'NOT LIKE', 'ns-stocktransfers%' )
            ->whereNotIn( 'key', [
                'ns_store_name',
                'ns_store_email',
                'ns_date_format',
                'ns_datetime_format',
                'ns_currency_precision',
                'ns_currency_iso',
                'ns_currency_symbol',
                'enabled_modules',
                'ns_pos_order_types',
            ] )->delete();

        return [
            'status' => 'success',
            'message' => __( 'The table has been truncated.' ),
        ];
    }

    /**
     * Will completely wipe the database
     * forcing a new installation to be made
     */
    public function hardReset(): array
    {
        BeforeHardResetEvent::dispatch();

        /**
         * this will only apply clearing all tables
         * when we're not using sqlite.
         */
        if ( env( 'DB_CONNECTION' ) !== 'sqlite' ) {
            $tables = DB::select( 'SHOW TABLES' );

            foreach ( $tables as $table ) {
                $table_name = array_values( (array) $table )[0];
                DB::statement( 'SET FOREIGN_KEY_CHECKS = 0' );
                DB::statement( "DROP TABLE `$table_name`" );
                DB::statement( 'SET FOREIGN_KEY_CHECKS = 1' );
            }
        } else {
            file_put_contents( database_path( 'database.sqlite' ), '' );
        }

        Artisan::call( 'key:generate', [ '--force' => true ] );
        Artisan::call( 'ns:cookie generate' );

        exec( 'rm -rf public/storage' );

        AfterHardResetEvent::dispatch();

        return [
            'status' => 'success',
            'message' => __( 'The database has been wiped out.' ),
        ];
    }

    public function handleCustom( $data )
    {
        /**
         * @var string $mode
         * @var bool   $create_sales
         * @var bool   $create_procurements
         */
        extract( $data );

        return Hook::filter( 'ns-handle-custom-reset', [
            'status' => 'error',
            'message' => __( 'No custom handler for the reset "' . $mode . '"' ),
        ], $data );
    }
}
