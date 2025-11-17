<?php

use App\Models\Permission;

if ( defined( 'NEXO_CREATE_PERMISSIONS' ) ) {
    $customers = Permission::firstOrNew( [ 'namespace' => 'wickxpos.create.customers' ] );
    $customers->name = __( 'Create Customers' );
    $customers->namespace = 'wickxpos.create.customers';
    $customers->description = __( 'Let the user create customers.' );
    $customers->save();

    $customers = Permission::firstOrNew( [ 'namespace' => 'wickxpos.delete.customers' ] );
    $customers->name = __( 'Delete Customers' );
    $customers->namespace = 'wickxpos.delete.customers';
    $customers->description = __( 'Let the user delete customers.' );
    $customers->save();

    $customers = Permission::firstOrNew( [ 'namespace' => 'wickxpos.update.customers' ] );
    $customers->name = __( 'Update Customers' );
    $customers->namespace = 'wickxpos.update.customers';
    $customers->description = __( 'Let the user update customers.' );
    $customers->save();

    $customers = Permission::firstOrNew( [ 'namespace' => 'wickxpos.read.customers' ] );
    $customers->name = __( 'Read Customers' );
    $customers->namespace = 'wickxpos.read.customers';
    $customers->description = __( 'Let the user read customers.' );
    $customers->save();

    $customers = Permission::firstOrNew( [ 'namespace' => 'wickxpos.import.customers' ] );
    $customers->name = __( 'Import Customers' );
    $customers->namespace = 'wickxpos.import.customers';
    $customers->description = __( 'Let the user import customers.' );
    $customers->save();

    $permission = Permission::firstOrNew( [ 'namespace' => 'wickxpos.customers.manage-account-history' ] );
    $permission->namespace = 'wickxpos.customers.manage-account-history';
    $permission->name = __( 'Manage Customer Account History' );
    $permission->description = __( 'Can add, deduct amount from each customers account.' );
    $permission->save();
}
