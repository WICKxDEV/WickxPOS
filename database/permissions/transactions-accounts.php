<?php

use App\Models\Permission;

if ( defined( 'NEXO_CREATE_PERMISSIONS' ) ) {
    $transactionAccount = Permission::firstOrNew( [ 'namespace' => 'wickxpos.create.transactions-account' ] );
    $transactionAccount->name = __( 'Create Transaction Account' );
    $transactionAccount->namespace = 'wickxpos.create.transactions-account';
    $transactionAccount->description = __( 'Let the user create transactions account' );
    $transactionAccount->save();

    $transactionAccount = Permission::firstOrNew( [ 'namespace' => 'wickxpos.delete.transactions-account' ] );
    $transactionAccount->name = __( 'Delete Transactions Account' );
    $transactionAccount->namespace = 'wickxpos.delete.transactions-account';
    $transactionAccount->description = __( 'Let the user delete Transaction Account' );
    $transactionAccount->save();

    $transactionAccount = Permission::firstOrNew( [ 'namespace' => 'wickxpos.update.transactions-account' ] );
    $transactionAccount->name = __( 'Update Transactions Account' );
    $transactionAccount->namespace = 'wickxpos.update.transactions-account';
    $transactionAccount->description = __( 'Let the user update Transaction Account' );
    $transactionAccount->save();

    $transactionAccount = Permission::firstOrNew( [ 'namespace' => 'wickxpos.read.transactions-account' ] );
    $transactionAccount->name = __( 'Read Transactions Account' );
    $transactionAccount->namespace = 'wickxpos.read.transactions-account';
    $transactionAccount->description = __( 'Let the user read Transaction Account' );
    $transactionAccount->save();
}
