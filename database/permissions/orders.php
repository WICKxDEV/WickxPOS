<?php

use App\Models\Permission;

if ( defined( 'NEXO_CREATE_PERMISSIONS' ) ) {
    $orders = Permission::firstOrNew( [ 'namespace' => 'wickxpos.create.orders' ] );
    $orders->name = __( 'Create Orders' );
    $orders->namespace = 'wickxpos.create.orders';
    $orders->description = __( 'Let the user create orders' );
    $orders->save();

    $orders = Permission::firstOrNew( [ 'namespace' => 'wickxpos.delete.orders' ] );
    $orders->name = __( 'Delete Orders' );
    $orders->namespace = 'wickxpos.delete.orders';
    $orders->description = __( 'Let the user delete orders' );
    $orders->save();

    $orders = Permission::firstOrNew( [ 'namespace' => 'wickxpos.update.orders' ] );
    $orders->name = __( 'Update Orders' );
    $orders->namespace = 'wickxpos.update.orders';
    $orders->description = __( 'Let the user update orders' );
    $orders->save();

    $orders = Permission::firstOrNew( [ 'namespace' => 'wickxpos.read.orders' ] );
    $orders->name = __( 'Read Orders' );
    $orders->namespace = 'wickxpos.read.orders';
    $orders->description = __( 'Let the user read orders' );
    $orders->save();

    $orders = Permission::firstOrNew( [ 'namespace' => 'wickxpos.void.orders' ] );
    $orders->name = __( 'Void Order' );
    $orders->namespace = 'wickxpos.void.orders';
    $orders->description = __( 'Let the user void orders' );
    $orders->save();

    $orders = Permission::firstOrNew( [ 'namespace' => 'wickxpos.refund.orders' ] );
    $orders->name = __( 'Refund Order' );
    $orders->namespace = 'wickxpos.refund.orders';
    $orders->description = __( 'Let the user refund orders' );
    $orders->save();

    $orders = Permission::firstOrNew( [ 'namespace' => 'wickxpos.make-payment.orders' ] );
    $orders->name = __( 'Make Payment To orders' );
    $orders->namespace = 'wickxpos.make-payment.orders';
    $orders->description = __( 'Allow the user to make payments to orders.' );
    $orders->save();
}
