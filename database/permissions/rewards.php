<?php

use App\Models\Permission;

if ( defined( 'NEXO_CREATE_PERMISSIONS' ) ) {
    $reward = Permission::firstOrNew( [ 'namespace' => 'wickxpos.create.rewards' ] );
    $reward->name = __( 'Create Rewards' );
    $reward->namespace = 'wickxpos.create.rewards';
    $reward->description = __( 'Let the user create Rewards' );
    $reward->save();

    $reward = Permission::firstOrNew( [ 'namespace' => 'wickxpos.delete.rewards' ] );
    $reward->name = __( 'Delete Rewards' );
    $reward->namespace = 'wickxpos.delete.rewards';
    $reward->description = __( 'Let the user delete Rewards' );
    $reward->save();

    $reward = Permission::firstOrNew( [ 'namespace' => 'wickxpos.update.rewards' ] );
    $reward->name = __( 'Update Rewards' );
    $reward->namespace = 'wickxpos.update.rewards';
    $reward->description = __( 'Let the user update Rewards' );
    $reward->save();

    $reward = Permission::firstOrNew( [ 'namespace' => 'wickxpos.read.rewards' ] );
    $reward->name = __( 'Read Rewards' );
    $reward->namespace = 'wickxpos.read.rewards';
    $reward->description = __( 'Let the user read Rewards' );
    $reward->save();
}
