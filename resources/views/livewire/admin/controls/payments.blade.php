<div class="md:ml-5">
    <div class="flex w-full p-3 space-x-2">


    {{-- Search Box --}}
    <div class="grid grid-cols-1 gap-2 md:grid-cols-5">

      <input wire:model.debounce.300ms='search' type="text"
        class="py-1 text-base text-gray-600 border-gray-400 rounded md:col-span-2 input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600"
        placeholder="Search...">


      {{-- order Asc --}}
      <div class="relative w-1/6">
        <select wire:model='orderAsc' id=""
          class="py-1 text-base text-gray-600 border-gray-400 rounded md:col-span-2 input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600 ">
          {{-- <option value="5" disabled>Select Osdfsdfsdfption</option> --}}
          <option value="">Please option</option>
          <option value="1">Asc</option>
          <option value="0" selected>Desc</option>



        </select>
      </div>
      {{-- Per Page --}}
      <div class="relative w-1/6">
        <select wire:model='perPage' id=""
          class="py-1 text-base text-gray-600 border-gray-400 rounded md:col-span-2 input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600 ">
          <option value="0" selected>Select per Page</option>
          <option value="10">10</option>
          <option value="25">25</option>
          <option value="50">50</option>
          <option value="100">100</option>



        </select>
      </div>

      {{-- Payment Success and Failure --}}
      <div class="relative w-1/6">
        <select wire:model='status' id=""
          class="py-1 text-base text-gray-600 border-gray-400 rounded md:col-span-2 input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600 ">
          <option value="">Select Status</option>
          <option value="TXN_SUCCESS">Success</option>
          <option value="TXN_FAILURE">Failure</option>


        </select>
      </div>
      {{-- Date filter from date to date --}}
      <div class="flex w-1/6 ">
        <div class="pr-12">

          <label for="start_date">From:</label>
          <input
            class="py-1 text-base text-gray-600 border-gray-400 rounded md:col-span-2 input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600 "
            type="date" wire:model.lazy="startDate" id="start_date">
        </div>
        <div>

          <label for="end_date">To:</label>
          <input
            class="py-1 text-base text-gray-600 border-gray-400 rounded md:col-span-2 input focus:text-empex-green focus:border-green-600 focus:outline-none focus:ring-green-600 "
            type="date" wire:model.lazy="endDate" id="end_date">
        </div>
      </div>
    </div>
  </div>
    <!-- Tab Contents -->
    <div class="flex flex-col w-full mt-5 text-center">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
          <div class="overflow-hidden border-b shadow">
            <table class="min-w-full divide-y divide-gray-200 ">
              <thead>
                <tr>
                  <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wide uppercase">
                    Name
                  </th>
                  <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wide uppercase">
                    Transition Id
                  </th>
                  <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wide uppercase">
                    Order Id
                  </th>
                  <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wide uppercase">
                    Status
                  </th>
                  <th scope="col" class="px-6 py-3 text-sm font-medium tracking-wide uppercase">
                    Date
                  </th>
  
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach($payments as $payment)
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 text-sm whitespace-nowrap">
                    {{ $payment->user->name }}
                  </td>
                  @if($payment->transactionId === NULL)
                  <td class="px-6 py-4 text-sm whitespace-nowrap">
                    Details Not Found
                  </td>
                  @else
                  <td class="px-6 py-4 text-sm whitespace-nowrap">
                    {{ $payment->transactionId }}
                  </td>
                  @endif
                  @if($payment->orderId === NULL)
                  <td class="px-6 py-4 text-sm whitespace-nowrap">
                    Details Not Found
                  </td>
                  @else
                  <td class="px-6 py-4 text-sm whitespace-nowrap">
                    {{ $payment->orderId }}
                  </td>
                  @endif
                  
                  @if($payment->status === NULL)
                  <td class="px-6 py-4 text-sm whitespace-nowrap">
                    Details Not Found
                  </td>
                  @else
                  <td class="px-6 py-4 text-sm whitespace-nowrap">
                    {{ $payment->status }}
                  </td>
                  @endif
                  <td class="px-6 py-4 text-sm whitespace-nowrap">
                    {{$payment->created_at->format('d M Y') }} 
                    {{-- <td>{{ $payment->formatted_created_at }}</td> --}}
                    
                  </td>
                  {{-- <td class="px-6 py-4 text-sm whitespace-nowrap">
                    {{ $payment->updated_at }}
                  </td> --}}
  
  
                </tr>
                
                {{-- @empty
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap" colspan="2">Receipt not found</td>
                </tr> --}}
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  
      <div class="py-2">
        {{ $payments->onEachSide(1)->links() }}
      </div>
    </div>
  </div>
      
