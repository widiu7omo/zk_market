<div>
    <header class="app-header bg-primary">
        <a href="javascript:window.location='{{url('/')}}'" class="btn-header"><i data-eva="arrow-back"
                                                                                    data-eva-fill="#fff"></i></a>
        <h5 class="title-header"> Keranjang </h5>
        <div class="header-right"></div>
    </header> <!-- section-header.// -->
    <main class="app-content">
        <section class="section-products padding-around">
            <h4>Keranjang Kosong</h4>
        </section> <!-- section-products  .// -->

        <hr class="divider">

        <section id="rincian-total" style="display: none" class="padding-around">
            <dl class="dlist-align text-black-50">
                <dt>Total Belanja</dt>
                <dd class="text-right" id="price-item">Rp.</dd>
            </dl>

            <a href="{{route('checkout')}}" class="btn rounded-0 mb-0 btn-block btn-primary bottom-sticky fixed-bottom"> <span
                    class="text"> Proses Pesanan </span>
                <i data-eva="arrow-ios-forward" data-eva-fill="#fff"></i></a>
        </section>

    </main>
</div>
@push('script')
    <script>
        const containerItems = $('.section-products');
        const cartHelper = {
            getCurrentItems() {
                var cartItems = localStorage.getItem('cart');
                if (cartItems != null) {
                    return Object.keys(JSON.parse(cartItems));
                }
                return [];
            },
            setCurrentItems(updatedValue) {
                localStorage.setItem('cart', JSON.stringify(updatedValue));
            },
            getCurrentCart() {
                var cartItems = localStorage.getItem('cart');
                if (cartItems != null) {
                    return JSON.parse(cartItems);
                }
                return [];
            },
            updateTotal(inputFormItem = null) {
                const priceOngkirTag = $('#price-ongkir');
                const priceItemTag = $('#price-item');
                const priceTotalTag = $('#price-all');
                var parentDiv;
                if (inputFormItem) {
                    parentDiv = inputFormItem.parents('.section-products');
                } else {
                    parentDiv = containerItems;
                }
                var getPriceEachItem = [];
                parentDiv.find('.price').each(function (index, item) {
                    var currentPrice = $(item).text().replace(/\D/g, "");
                    console.log(currentPrice)
                    getPriceEachItem.push(parseInt(currentPrice));
                })
                var totalItem = getPriceEachItem.reduce(function (total, val) {
                    return total + val;
                });
                priceItemTag.text('Rp. ' + $.number(totalItem, 0, ',', '.'));
                var priceOngkir = priceOngkirTag.text().replace(/\D/g, "");
                priceTotalTag.text('Rp. ' + $.number((totalItem - parseInt(priceOngkir)), 0, ',', '.'));
            },
            updateTotalPriceDom(inputFormItem, method) {
                var parentDiv = inputFormItem.parents('article.item-cart');
                var currentTotalPrice = parentDiv.find('.price').text().replace(/\D/g, "");
                var priceItem = parentDiv.find('.price-tag').text().replace(/\D/g, "");
                var currentPrice = 0;
                if (method === 'plus') {
                    currentPrice = parseInt(currentTotalPrice) + parseInt(priceItem);
                } else {
                    currentPrice = parseInt(currentTotalPrice) - parseInt(priceItem);
                }
                parentDiv.find('.price').text('Rp. ' + $.number(currentPrice, 0, ',', '.'));
                cartHelper.updateTotal(inputFormItem);
            },
            removeItemCart($this) {
                var inputFormItem = $($this.target).parents('div').siblings('input');
                var currentValue = inputFormItem.val();
                cartHelper.updateTotalPriceDom(inputFormItem);
                var updatedValue = parseInt(currentValue) - 1;
                var currentCart = cartHelper.getCurrentCart();
                if (parseInt(updatedValue) !== 0) {
                    inputFormItem.val(updatedValue);
                    currentCart[inputFormItem.data('id')].count = updatedValue;
                } else {
                    delete currentCart[inputFormItem.data('id')];
                    inputFormItem.parents('article.item-cart').remove();
                    Snackbar.show({text: 'Barang di hapus dari keranjang belanja.'})
                    if (Object.keys(currentCart).length === 0) {
                        $('#rincian-total').hide();
                        containerItems.html('<h4>Keranjang Kosong</h4>');
                    }
                }
                cartHelper.setCurrentItems(currentCart);
                cartHelper.updateTotal(inputFormItem);
            },
            addItemCart($this) {
                var inputFormItem = $($this.target).parents('div').siblings('input');
                cartHelper.updateTotalPriceDom(inputFormItem, 'plus');
                var currentValue = inputFormItem.val();
                var updatedValue = parseInt(currentValue) + 1;
                inputFormItem.val(updatedValue);
                var currentCart = cartHelper.getCurrentCart();
                currentCart[inputFormItem.data('id')].count = updatedValue;
                cartHelper.setCurrentItems(currentCart);
            },
            showCartItemDetail(data) {
                const currentItems = this.getCurrentCart();
                var generatedHtmlItem = data.map(function (item) {
                    var gambar = JSON.parse(item.gambar);
                    return `<article class="item-cart">
                                <figure class="itemside mb-3">
                                    <div class="aside"><img src="{{asset('storage/')}}/${gambar[0]}" class="rounded img-md"></div>
                                    <figcaption class="info">
                                        <a href="#" class="title text-truncate">${item.nama}</a>
                                        <div class="price-wrap mb-3">
                                            <small class="text-muted"><span class="price-tag font-weight-bold">Rp. ${item.promosi !== '0' ? $.number(item.harga_promo, 0, ',', '.') : $.number(item.harga, 0, ',', '.')}</span> <span>${item.promosi !== '0' ? `<del>Rp. ${$.number(item.harga, 0, ',', '.')}</del>` : ``}</span>/per item</small><br>
                                            <strong class="price">Rp. ${$.number(parseInt(currentItems[item.id].count) * (item.promosi !== '0' ? parseInt(item.harga_promo) : parseInt(item.harga)), 0, ',', '.')}</strong>
                                        </div>
                                    </figcaption>
                                </figure>
                                <div class="input-group input-spinner float-right">
                                    <div class="input-group-prepend">
                                        <button id="btn-min-item" class="btn btn-light" type="button">
                                        <svg height="20" width="20" fill="#969696" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="Layer 2"><g data-name="minus-circle"><rect width="24" height="24" opacity="0"/><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm3 11H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2z"/></g></g></svg></button>
                                    </div>
                                    <input type="number" class="form-control" data-id="${item.id}" value="${currentItems[item.id].count}">
                                    <div class="input-group-append">
                                        <button id="btn-plus-item" class="btn btn-light" type="button">
                                        <svg height="20" width="20" fill="#969696" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="Layer 2"><g data-name="plus-circle"><rect width="24" height="24" opacity="0"/><path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm3 11h-2v2a1 1 0 0 1-2 0v-2H9a1 1 0 0 1 0-2h2V9a1 1 0 0 1 2 0v2h2a1 1 0 0 1 0 2z"/></g></g></svg></button>
                                    </div>
                                </div>
                        </article>`;
                });
                containerItems.html(generatedHtmlItem);
                cartHelper.updateTotal();
            }
        }
        $(document).ready(function () {
            containerItems.html('<h5 class="text-center mt-3">Sedang mengambil produk dalam keranjang.</h5>');
            $.ajax({
                url: '{{url('cart_products')}}',
                method: 'POST',
                data: {
                    products: cartHelper.getCurrentItems()
                },
                success(res) {
                    if (res.status === 'success') {
                        if (res.data.length !== 0) {
                            containerItems.on('click', '#btn-min-item', cartHelper.removeItemCart.bind(this));
                            containerItems.on('click', '#btn-plus-item', cartHelper.addItemCart.bind(this));
                            $('#rincian-total').show();
                            return cartHelper.showCartItemDetail(res.data);
                        }
                        return containerItems.html('<h5 class="text-center">Keranjang Kosong</h5>')
                    }
                    return containerItems.html('<h5 class="text-center mt-3">Keranjang Kosong</h5>')
                }
            })
        })

    </script>
@endpush
