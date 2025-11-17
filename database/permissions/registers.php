<?php

use App\Models\Permission;

if ( defined( 'NEXO_CREATE_PERMISSIONS' ) ) {
    $registers = Permission::firstOrNew( [ 'namespace' => 'wickxpos.create.registers' ] );
    $registers->name = __( 'Create Registers' );
    $registers->namespace = 'wickxpos.create.registers';
    $registers->description = __( 'Let the user create registers' );
    $registers->save();

    $registers = Permission::firstOrNew( [ 'namespace' => 'wickxpos.delete.registers' ] );
    $registers->name = __( 'Delete Registers' );
    $registers->namespace = 'wickxpos.delete.registers';
    $registers->description = __( 'Let the user delete registers' );
    $registers->save();

    $registers = Permission::firstOrNew( [ 'namespace' => 'wickxpos.update.registers' ] );
    $registers->name = __( 'Update Registers' );
    $registers->namespace = 'wickxpos.update.registers';
    $registers->description = __( 'Let the user update registers' );
    $registers->save();

    $registers = Permission::firstOrNew( [ 'namespace' => 'wickxpos.read.registers' ] );
    $registers->name = __( 'Read Registers' );
    $registers->namespace = 'wickxpos.read.registers';
    $registers->description = __( 'Let the user read registers' );
    $registers->save();

    $registers = Permission::firstOrNew( [ 'namespace' => 'wickxpos.read.registers-history' ] );
    $registers->name = __( 'Read Registers History' );
    $registers->namespace = 'wickxpos.read.registers-history';
    $registers->description = __( 'Let the user read registers history' );
    $registers->save();

    $registers = Permission::firstOrNew( [ 'namespace' => 'wickxpos.use.registers' ] );
    $registers->name = __( 'Read Use Registers' );
    $registers->namespace = 'wickxpos.use.registers';
    $registers->description = __( 'Let the user use registers' );
    $registers->save();
}
