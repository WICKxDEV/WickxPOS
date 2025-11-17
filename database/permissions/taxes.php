<?php

use App\Models\Permission;

if ( defined( 'NEXO_CREATE_PERMISSIONS' ) ) {
    $taxes = Permission::firstOrNew( [ 'namespace' => 'wickxpos.create.taxes' ] );
    $taxes->name = __( 'Create Taxes' );
    $taxes->namespace = 'wickxpos.create.taxes';
    $taxes->description = __( 'Let the user create taxes' );
    $taxes->save();

    $taxes = Permission::firstOrNew( [ 'namespace' => 'wickxpos.delete.taxes' ] );
    $taxes->name = __( 'Delete Taxes' );
    $taxes->namespace = 'wickxpos.delete.taxes';
    $taxes->description = __( 'Let the user delete taxes' );
    $taxes->save();

    $taxes = Permission::firstOrNew( [ 'namespace' => 'wickxpos.update.taxes' ] );
    $taxes->name = __( 'Update Taxes' );
    $taxes->namespace = 'wickxpos.update.taxes';
    $taxes->description = __( 'Let the user update taxes' );
    $taxes->save();

    $taxes = Permission::firstOrNew( [ 'namespace' => 'wickxpos.read.taxes' ] );
    $taxes->name = __( 'Read Taxes' );
    $taxes->namespace = 'wickxpos.read.taxes';
    $taxes->description = __( 'Let the user read taxes' );
    $taxes->save();
}
