@if($order->status === 'pending')
    <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-xs font-medium">
        Pending
    </span>

@elseif($order->status === 'paid')
    <span class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-medium">
        Paid
    </span>

@elseif($order->status === 'shipped')
    <span class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-medium">
        Shipped
    </span>

@elseif($order->status === 'completed')
    <span class="bg-emerald-100 text-emerald-600 px-3 py-1 rounded-full text-xs font-medium">
        Completed
    </span>

@elseif($order->status === 'cancelled')
    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-medium">
        Cancelled
    </span>

@else
    <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-medium">
        {{ ucfirst($order->status) }}
    </span>
@endif