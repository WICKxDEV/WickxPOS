<?php

use App\Models\Permission;

if ( defined( 'NEXO_CREATE_PERMISSIONS' ) ) {
    $coupons = Permission::firstOrNew( [ 'namespace' => 'wickxpos.create.coupons' ] );
    $coupons->name = __( 'Create Coupons' );
    $coupons->namespace = 'wickxpos.create.coupons';
    $coupons->description = __( 'Let the user create coupons' );
    $coupons->save();

    $coupons = Permission::firstOrNew( [ 'namespace' => 'wickxpos.delete.coupons' ] );
    $coupons->name = __( 'Delete Coupons' );
    $coupons->namespace = 'wickxpos.delete.coupons';
    $coupons->description = __( 'Let the user delete coupons' );
    $coupons->save();

    $coupons = Permission::firstOrNew( [ 'namespace' => 'wickxpos.update.coupons' ] );
    $coupons->name = __( 'Update Coupons' );
    $coupons->namespace = 'wickxpos.update.coupons';
    $coupons->description = __( 'Let the user update coupons' );
    $coupons->save();

    $coupons = Permission::firstOrNew( [ 'namespace' => 'wickxpos.read.coupons' ] );
    $coupons->name = __( 'Read Coupons' );
    $coupons->namespace = 'wickxpos.read.coupons';
    $coupons->description = __( 'Let the user read coupons' );
    $coupons->save();
}
