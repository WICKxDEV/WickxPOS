<?php

use App\Models\Permission;
use App\Models\Role;
use App\Widgets\ProfileWidget;

$storeCashier = Role::firstOrNew( [ 'namespace' => 'wickxpos.store.cashier' ] );
$storeCashier->name = __( 'Store Cashier' );
$storeCashier->namespace = 'wickxpos.store.cashier';
$storeCashier->locked = true;
$storeCashier->description = __( 'Has a control over the sale process.' );
$storeCashier->save();
$storeCashier->addPermissions( [ 'read.dashboard' ] );
$storeCashier->addPermissions( Permission::includes( '.profile' )->get()->map( fn( $permission ) => $permission->namespace ) );
$storeCashier->addPermissions( Permission::whereIn( 'namespace', [
    'wickxpos.create.orders',
    'wickxpos.read.orders',
    'wickxpos.update.orders',
    'wickxpos.void.orders',
    'wickxpos.refund.orders',
    'wickxpos.make-payment.orders',
    'wickxpos.create.orders-instaments',
    'wickxpos.update.orders-instaments',
    'wickxpos.read.orders-instaments',
    'wickxpos.customers.manage-account-history',
] )->get()->map( fn( $permission ) => $permission->namespace ) );

$storeCashier->addPermissions( Permission::includes( '.pos' )->get()->map( fn( $permission ) => $permission->namespace ) );
$storeCashier->addPermissions( Permission::whereIn( 'namespace', [
    ( new ProfileWidget )->getPermission(),
] )->get()->map( fn( $permission ) => $permission->namespace ) );
