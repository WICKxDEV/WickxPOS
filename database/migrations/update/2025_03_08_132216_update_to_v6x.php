<?php

use App\Classes\Schema;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Artisan::call( 'ns:doctor', [
            '--purge-orphan-migrations' => true,
        ] );

        Schema::table( 'wickxpos_notifications', function ( Blueprint $table ) {
            if ( ! Schema::hasColumn( 'wickxpos_notifications', 'actions' ) ) {
                $table->json( 'actions' )->nullable();
            }
        } );

        /**
         * Create POS action permissions for v6.x
         */
        if ( ! defined( 'NEXO_CREATE_PERMISSIONS' ) ) {
            define( 'NEXO_CREATE_PERMISSIONS', true );
        }

        // Create POS cart action permissions
        $posCartPermissions = [
            'wickxpos.cart.product-discount' => __( 'Cart: Change Product Discount' ),
            'wickxpos.cart.product-price' => __( 'Cart: Edit Product Price' ),
            'wickxpos.cart.product-wholesale-price' => __( 'Cart: Use Wholesale Price' ),
            'wickxpos.cart.product-delete' => __( 'Cart: Product Delete' ),
            'wickxpos.cart.settings' => __( 'Cart: Change Settings' ),
            'wickxpos.cart.taxes' => __( 'Cart: Set Taxes' ),
            'wickxpos.cart.comments' => __( 'Cart: Add Comments' ),
            'wickxpos.cart.order-type' => __( 'Cart: Change Order Type' ),
            'wickxpos.cart.coupons' => __( 'Cart: Apply Coupons' ),
            'wickxpos.cart.products' => __( 'Cart: Create Quick Product' ),
            'wickxpos.cart.void' => __( 'Cart: Void Order' ),
            'wickxpos.cart.discount' => __( 'Cart: Apply Discount' ),
            'wickxpos.cart.hold' => __( 'Cart: Hold Order' ),
        ];

        foreach ( $posCartPermissions as $namespace => $name ) {
            $permission = Permission::firstOrNew( [ 'namespace' => $namespace ] );
            $permission->name = $name;
            $permission->namespace = $namespace;
            $permission->description = sprintf( __( 'Allow access to %s feature in POS cart.' ), strtolower( $name ) );
            $permission->save();
        }

        /**
         * Assign new permissions to admin role
         */
        $admin = Role::namespace( 'admin' );
        if ( $admin instanceof Role ) {
            $admin->addPermissions( array_keys( $posCartPermissions ) );
        }

        /**
         * We'll make the column "order_id" optional on the table
         * `wickxpos_customers_account_history`.
         */
        Schema::table( 'wickxpos_customers_account_history', function ( Blueprint $table ) {
            $table->integer( 'order_id' )->nullable()->change();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table( 'wickxpos_notifications', function ( Blueprint $table ) {
            $table->dropColumn( 'actions' );
        } );
    }
};
