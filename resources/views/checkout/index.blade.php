<x-app-layout>

    <div class="-mb-16 text-gray-700" x-data="{
        pago: 1
    }">

        <div class="grid grid-cols-1 lg:grid-cols-2">

            <div class="col-span-1 bg-white">
                <div class="lg:max-w-[40erm] py-12 px-4 lg:pr-8 sm:pl-6 lg:pl-8">

                    <h1 class="text-2xl font-semibold mb-2">
                        Pago
                    </h1>

                    <div class="shadow rounded-lg overflow-hidden border border-gray-400">
                        <ul class="divide-y divide-gray-400">
                            <li>
                                <label class="p-4 flex items-center">
                                    <input type="radio" x-model="pago" value="1">

                                    <span class="ml-2">
                                        Tarjeta de débito / crédito
                                    </span>

                                    <img class="h-6 ml-auto" src="https://codersfree.com/img/payments/credit-cards.png"
                                        alt="">
                                </label>

                                <div class="p-4 bg-gray-100 text-center border-t border-gray-400" x-show="pago == 1">
                                    <i class="fa-regular fa-credit-card text-9xl"></i>

                                    <p class="mt-2">
                                        Luego de hacer click en "Pagar ahora", se abrirá el checkout de Niubiz para
                                        completar tu compra de forma segura.
                                    </p>
                                </div>
                            </li>

                            <li>
                                <label class="p-4 flex items-center">
                                    <input type="radio" x-model="pago" value="2">

                                    <span class="ml-2">
                                        Depósito Bancario o Yape
                                    </span>
                                </label>

                                <div class="p-4 bg-gray-100 flex justify-center border-t border-gray-400" x-cloak
                                    x-show="pago == 2">

                                    <div>
                                        <p>1. Pago por depósito o transferencia bancaria:</p>
                                        <p>- BCP soles: 198-987654321-98</p>
                                        <p>- CCI: 002-198-987654321</p>
                                        <p>- Razón social: Neuma Racing Peru Import e. I. R. L.</p>
                                        <p>- RUC: 20604664951</p>
                                        <p>2. Pago por Yape</p>
                                        <p>- Yape al número +51 948 464 266 (Neuma Racing)</p>
                                        <p>
                                            Enviar el comprobante de pago a +51 948 464 266
                                        </p>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-span-1">
                <div class="lg:max-w-[60rem] py-12 px-4 lg:pl-8 sm:pr-6 lg:pr-8">

                    <ul class="space-y-4 mb-4">
                        @foreach (Cart::instance('shopping')->content() as $item)
                            <li class="flex items-center space-x-4">

                                <div class="flex-shrink-0 relative">
                                    <img class="h-16 aspect-square" src="{{ $item->options->image }}" alt="">

                                    <div
                                        class="flex justify-center items-center h-6 w-6 bg-yellow-400 rounded-full absolute -right-2 -top-2">
                                        <span class="text-black font-semibold">
                                            {{ $item->qty }}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex-1">

                                    <p>
                                        {{ $item->name }}
                                    </p>

                                </div>

                                <div class="flex-shrink-0">
                                    <p>
                                        S/. {{ $item->price }}
                                    </p>
                                </div>

                            </li>
                        @endforeach
                    </ul>

                    <div class="flex justify-between">
                        <p>
                            Subtotal
                        </p>

                        <p>
                            S/. {{ Cart::instance('shopping')->subtotal() }}
                        </p>
                    </div>

                    <div class="flex justify-between">
                        <p>
                            Precio de envío

                            <i class="fas fa-info-circle" title="El precio de envío es de S/5.00"></i>
                        </p>

                        <p>
                            S/. 5.00
                        </p>
                    </div>

                    <hr class="my-3">

                    <div class="flex justify-between mb-4">
                        <p class="text-lg font-semibold">
                            Total
                        </p>

                        <p>
                            S/. {{ Cart::instance('shopping')->subtotal() + 5 }}
                        </p>
                    </div>

                    <div>
                        <button onclick="VisanetCheckout.open()" class="btn btn-red w-full">
                            Finalizar pedido
                        </button>
                    </div>

                </div>
            </div>

        </div>

    </div>

    @push('js')
        <script type="text/javascript" src="{{ config('services.niubiz.url_js') }}"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {

                let purchasenumber = Math.floor(Math.random() * 1000000000);
                let amount = {{ Cart::instance('shopping')->subtotal() + 5 }};

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
                    action: 'paginaRespuesta',
                    complete: function(params) {
                        alert(JSON.stringify(params));
                    }
                });
            });

            function procesar(parametros) {
                console.log(parametros);
            }
        </script>
    @endpush


</x-app-layout>
