<?php

use App\Models\Permission;

if ( defined( 'NEXO_CREATE_PERMISSIONS' ) ) {
    $providers = Permission::firstOrNew( [ 'namespace' => 'wickxpos.create.providers' ] );
    $providers->name = __( 'Create Providers' );
    $providers->namespace = 'wickxpos.create.providers';
    $providers->description = __( 'Let the user create providers' );
    $providers->save();

    $providers = Permission::firstOrNew( [ 'namespace' => 'wickxpos.delete.providers' ] );
    $providers->name = __( 'Delete Providers' );
    $providers->namespace = 'wickxpos.delete.providers';
    $providers->description = __( 'Let the user delete providers' );
    $providers->save();

    $providers = Permission::firstOrNew( [ 'namespace' => 'wickxpos.update.providers' ] );
    $providers->name = __( 'Update Providers' );
    $providers->namespace = 'wickxpos.update.providers';
    $providers->description = __( 'Let the user update providers' );
    $providers->save();

    $providers = Permission::firstOrNew( [ 'namespace' => 'wickxpos.read.providers' ] );
    $providers->name = __( 'Read Providers' );
    $providers->namespace = 'wickxpos.read.providers';
    $providers->description = __( 'Let the user read providers' );
    $providers->save();
}
