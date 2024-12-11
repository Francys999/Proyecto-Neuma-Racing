<x-app-layout>
    <div class="-mb-16 text-gray-700" x-data="{ pago: 1 }">

        <!-- Sección principal -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            <!-- Opciones de pago -->
            <div class="col-span-1 bg-white rounded-lg shadow">
                <div class="lg:max-w-[40erm] py-12 px-4 lg:pr-8 sm:pl-6 lg:pl-8">

                    <h1 class="text-2xl font-semibold mb-4 text-gray-800">
                        Pago
                    </h1>

                    <div class="shadow rounded-lg overflow-hidden border border-gray-300">
                        <ul class="divide-y divide-gray-300">
                            <li>
                                <label class="p-4 flex items-center">
                                    <input type="radio" x-model="pago" value="1" class="text-red-500 focus:ring-red-500">
                                    <span class="ml-2 font-medium text-gray-800">Tarjeta de débito / crédito</span>
                                    <img class="h-6 ml-auto" src="https://codersfree.com/img/payments/credit-cards.png" alt="">
                                </label>

                                <div class="p-4 bg-gray-100 text-center border-t border-gray-300" x-show="pago == 1">
                                    <i class="fa-regular fa-credit-card text-6xl text-gray-500"></i>
                                    <p class="mt-4 text-sm text-gray-600">
                                        Luego de hacer click en "Finalizar pedido", se abrirá el checkout de Niubiz para completar tu compra de forma segura.
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Resumen del pedido -->
            <div class="col-span-1 bg-white rounded-lg shadow">
                <div class="lg:max-w-[60rem] py-12 px-4 lg:pl-8 sm:pr-6 lg:pr-8">

                    <ul class="space-y-4 mb-6">
                        @foreach ($content as $item)
                            <li class="flex items-center space-x-4 bg-gray-50 p-3 rounded-lg">
                                <div class="relative">
                                    <img class="h-16 w-16 object-cover rounded-md" src="{{ $item->options->image }}" alt="Producto">
                                    <div class="flex justify-center items-center h-6 w-6 bg-yellow-400 rounded-full absolute -right-2 -top-2">
                                        <span class="text-black font-semibold">{{ $item->qty }}</span>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">{{ $item->name }}</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">S/. {{ $item->price }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-600">Subtotal</p>
                            <p class="font-medium text-gray-800">S/. {{ $subtotal }}</p>
                        </div>

                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-600">
                                Precio de envío
                                <i class="fas fa-info-circle text-gray-500" title="El precio de envío es de S/5.00"></i>
                            </p>
                            <p class="font-medium text-gray-800">S/. {{ $delivery }}</p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="flex justify-between items-center mb-6">
                        <p class="text-lg font-bold text-gray-800">Total</p>
                        <p class="text-lg font-bold text-gray-800">S/. {{ $total }}</p>
                    </div>

                    <button onclick="VisanetCheckout.open()" class="btn btn-red w-full">
                        Finalizar pedido
                    </button>

                    <!-- Mensaje informativo si hay errores -->
                    @if (session('niubiz'))
                        <div class="p-4 mt-6 text-sm bg-red-50 text-red-700 rounded-lg">
                            <p class="mb-2">
                                <b>Error:</b> {{ $response['data']['ACTION_DESCRIPTION'] ?? 'No se pudo completar el pago' }}
                            </p>
                            <p>
                                <b>Número de pedido:</b> {{ $purchaseNumber }}
                            </p>
                            <p>
                                <b>Fecha y hora:</b> 
                                {{ now()->createFromFormat('ymdHis', $response['data']['TRANSACTION_DATE'])->format('d-m-Y H:i:s') }}
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sección de relleno -->
        <div class="mt-10 bg-gray-100 py-10">
            <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300 ease-in-out group">
                    <i class="fa-solid fa-lock text-red-500 text-4xl mb-4"></i>
                    <h3 class="text-lg font-bold text-gray-800 group-hover:text-red-500 transition duration-300">
                        Pago 100% Seguro
                    </h3>
                    <p class="text-sm text-gray-600">
                        Realiza tus pagos con total seguridad gracias a nuestro sistema de checkout protegido.
                    </p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300 ease-in-out group">
                    <i class="fa-solid fa-clock text-blue-500 text-4xl mb-4"></i>
                    <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-500 transition duration-300">
                        Proceso Rápido
                    </h3>
                    <p class="text-sm text-gray-600">
                        Finaliza tu pedido en pocos minutos con nuestro sistema optimizado de pago.
                    </p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition duration-300 ease-in-out group">
                    <i class="fa-solid fa-user-shield text-green-500 text-4xl mb-4"></i>
                    <h3 class="text-lg font-bold text-gray-800 group-hover:text-green-500 transition duration-300">
                        Protección al Cliente
                    </h3>
                    <p class="text-sm text-gray-600">
                        Garantizamos la protección de tu información y un servicio de soporte confiable.
                    </p>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script type="text/javascript" src="{{ config('services.niubiz.url_js') }}"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                let purchasenumber = Math.floor(Math.random() * 1000000000);
                let amount = {{ $total }};

                VisanetCheckout.configure({
                    sessiontoken: '{{ $session_token }}',
                    channel: 'web',
                    merchantid: "{{ config('services.niubiz.merchant_id') }}",
                    purchasenumber: purchasenumber,
                    amount: amount,
                    expirationminutes: '20',
                    timeouturl: 'about:blank',
                    merchantlogo: 'img/comercio.png',
                    formbuttoncolor: '#000000',
                    action: "{{ route('checkout.paid') }}?amount=" + amount + "&purchaseNumber=" +
                        purchasenumber,
                    complete: function(params) {
                        alert(JSON.stringify(params));
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
