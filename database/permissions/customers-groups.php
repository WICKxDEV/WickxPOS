<?php

use App\Models\Permission;

if ( defined( 'NEXO_CREATE_PERMISSIONS' ) ) {
    $customersGroups = Permission::firstOrNew( [ 'namespace' => 'wickxpos.create.customers-groups' ] );
    $customersGroups->name = __( 'Create Customers Groups' );
    $customersGroups->namespace = 'wickxpos.create.customers-groups';
    $customersGroups->description = __( 'Let the user create Customers Groups' );
    $customersGroups->save();

    $customersGroups = Permission::firstOrNew( [ 'namespace' => 'wickxpos.delete.customers-groups' ] );
    $customersGroups->name = __( 'Delete Customers Groups' );
    $customersGroups->namespace = 'wickxpos.delete.customers-groups';
    $customersGroups->description = __( 'Let the user delete Customers Groups' );
    $customersGroups->save();

    $customersGroups = Permission::firstOrNew( [ 'namespace' => 'wickxpos.update.customers-groups' ] );
    $customersGroups->name = __( 'Update Customers Groups' );
    $customersGroups->namespace = 'wickxpos.update.customers-groups';
    $customersGroups->description = __( 'Let the user update Customers Groups' );
    $customersGroups->save();

    $customersGroups = Permission::firstOrNew( [ 'namespace' => 'wickxpos.read.customers-groups' ] );
    $customersGroups->name = __( 'Read Customers Groups' );
    $customersGroups->namespace = 'wickxpos.read.customers-groups';
    $customersGroups->description = __( 'Let the user read Customers Groups' );
    $customersGroups->save();
}
