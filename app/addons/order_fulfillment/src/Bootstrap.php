<?php
/***************************************************************************
 *                                                                          *
 *   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 *                                                                          *
 ****************************************************************************
 * PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
 * "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
 ****************************************************************************/

namespace Tygh\Addons\OrderFulfillment;

use Tygh\Core\ApplicationInterface;
use Tygh\Core\BootstrapInterface;
use Tygh\Core\HookHandlerProviderInterface;

class Bootstrap implements BootstrapInterface, HookHandlerProviderInterface
{
    /**
     * @inheritDoc
     */
    public function boot(ApplicationInterface $app)
    {
        $app->register(new ServiceProvider());
    }

    /**
     * @inheritDoc
     */
    public function getHookHandlerMap()
    {
        return [
            'are_company_orders_fulfilled_by_marketplace' => [
                'addons.order_fulfillment.hook_handlers.companies',
                'onAreCompanyOrdersFulfilledByMarketplace',
            ],
            'update_company_pre' => [
                'addons.order_fulfillment.hook_handlers.companies',
                'onPreCompanyUpdate',
            ],
            'pre_place_order' => [
                'addons.order_fulfillment.hook_handlers.orders',
                'onPrePlaceOrder',
            ],
            'place_suborders' => [
                'addons.order_fulfillment.hook_handlers.orders',
                'onPlaceSuborders',
            ],
            'shippings_group_products_list' => [
                'addons.order_fulfillment.hook_handlers.shippings',
                'onGroupProductsList',
            ],
            'shippings_get_shippings_list' => [
                'addons.order_fulfillment.hook_handlers.shippings',
                'onGetShippingsList',
            ],
            'vendor_plan_update' => [
                'addons.order_fulfillment.hook_handlers.vendor_plans',
                'onVendorPlanUpdate',
            ],
            'checkout_update_steps_pre' => [
                'addons.order_fulfillment.hook_handlers.checkout',
                'onCheckoutUpdateStepsPre',
            ],
            'is_shipping_sent_by_marketplace' => [
                'addons.order_fulfillment.hook_handlers.shippings',
                'onIsShippingSentByMarketplace',
            ],
            'pre_promotion_validate' => [
                'addons.order_fulfillment.hook_handlers.promotions',
                'onPrePromotionValidate',
            ],
            'checkout_place_orders_pre_route' => [
                'addons.order_fulfillment.hook_handlers.checkout',
                'onCheckoutPlaceOrdersPreRoute',
            ],
            'vendor_plans_calculate_commission_for_payout_post' => [
                'addons.order_fulfillment.hook_handlers.vendor_plans',
                'onVendorPlansCalculateCommissionForPayoutPost'
            ],
            'update_shipping_post' => [
                'addons.order_fulfillment.hook_handlers.shippings',
                'onUpdateShippingPost',
            ],
        ];
    }
}
