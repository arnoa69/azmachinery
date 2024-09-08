<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ $product->name }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="http://azmachinery.test/favicon.ico" type="image/x-icon">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        .position-zero {
            position: fixed;
            top: -46px;
            left: -46px;
            right: -45px;
            padding: 40px;
        }

        .left-column {
            float: left;
            width: 66.6%;
            margin-left: 25px;
            margin-top: -20px;
            width: 440px;
        }

        .page-break {
            page-break-after: always;
        }

        .clear {
            clear: both;
        }

        .icon {
            font-size: 22px;
            margin-left: -6px;
        }

        /* Start HEADER */
        #header {
            position: fixed;
            height: 140px;
            background-color: #BF2237;
            text-transform: uppercase;
            color: #fff;
        }

        .product-name {
            float: left;
            width: 65%;
            margin-left: 25px;
            margin-top: -20px;
        }

        .product-name h1 {
            font-size: 26px;
            font-weight: normal;
            margin-bottom: 0;
        }

        .product-name h2 {
            font-size: 29px;
            font-weight: bold;
            margin-bottom: 0;
            margin-top: 0;
        }

        .product-name h3 {
            font-size: 16px;
            font-weight: normal;
            margin-bottom: 0;
        }

        .logo {
            float: right;
            width: 35%;
        }

        .logo img {
            margin-top: -40px;
            padding-left: 50px;
        }

        /* END HEADER */

        #description {
            position: fixed;
            background-color: #EFEFEF;
            top: 154px;
            height: 120px;
            color: #0f0d0d;
        }

        .description-content {
            float: left;
            width: 66.6%;
            margin-left: 25px;
            margin-top: -20px;
        }

        .description-content h3 {
            font-size: 16px;
            font-weight: bold;
            margin-top: -20px;
            text-transform: uppercase;
        }

        .description-content p {
            font-size: 12px;
            margin-top: -10px;
            padding-right: 30px;
        }

        .image-frame {
            float: right;
            margin-top: -88px;
            margin-right: -21px;
            max-width: 245px;
            height: 178px;
            position: relative;

        }

        .product-image {
            float: right;
            margin-left: 60px;
            margin-top: 1px;
            margin-right: 1px;
            max-height: 175px;
            position: relative;
            width: 100%;
        }

        .product-image img {
            border: solid 1px rgb(69, 62, 62);
        }

        /* END DESCRIPTION */
        .button-container {
            display: table;
            width: 100%;
            margin-top: -45px;
        }

        .button-row {
            display: table-row;
        }

        .button-cell {
            display: table-cell;
            width: 33.33%;
            text-align: center;
        }

        .button {
            font-size: 12px;
            text-decoration: none;
            color: #fff;
            background-color: #BF2237;
            padding: 15px 10px 0px 10px;
            border-radius: 6px;
            height: 2px;
            font-weight: bold;
            text-transform: uppercase;
        }

        /* END CALL TO ACTION BUTTONS */
        #technical {
            position: fixed;
            top: 365px;
            height: 340px;
            color: #0f0d0d;
        }

        .technical-data {
            float: left;
            width: 66.6%;
            margin-left: 25px;
            margin-top: 5px;
            width: 470px;
            background-color: #fff;
        }

        .technical-data h3 {
            margin-top: 6px;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
        }

        table#technical-table,
        table#price-table {
            width: 92%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        table#technical-table th,
        td,
        table#price-table th,
        td,
        table#option-price-table th,
        td {
            text-align: left;
        }

        table#technical-table tr,
        td,
        table#price-table tr,
        td {
            background-color: #fff;
        }

        table#technical-table td,
        table#price-table td,
        table#option-price-table td {
            border-bottom: 1px dotted #4d4c4c;
            font-size: 12px;
            color: #333;
        }

        table#technical-table th,
        table#price-table th,
        table#option-price-table th {
            background-color: #f0f0f0;
            color: #333;
            font-weight: bold;
            font-size: 12px;
        }

        table#technical-table th:first-child {
            width: 245px;
        }

        table#technical-table th:last-child {
            width: 105px;
        }

        .features {
            position: relative;
            float: right;
            margin-top: -5px;
            margin-right: -17px;
            width: 250px;
            min-height: 175px;
        }

        .features h3 {
            margin-left: 0;
            font-size: 16px;
        }

        .features ul {
            margin-left: 12px;
            margin-top: -2px;
            padding-left: 0;
            font-size: 12px;
            list-style-type: square;
        }

        /* END TECHNICAL */
        #price-options {
            position: fixed;
            top: 775px;
            height: 120px;
            color: #0f0d0d;
        }

        .price-box {
            float: left;
            width: 66.6%;
            margin-top: -30px;
            width: 470px;
            margin-left: 25px;
        }

        .options-box h3,
        .price-box h3 {
            font-size: 16px;
            font-weight: bold;
            margin-top: -5px;
            text-transform: uppercase;
        }

        .without-tax-info {
            position: absolute;
            font-size: 11px;
            margin-top: -20px;
            margin-left: 155px;
            font-weight: bold
        }

        .options-box {
            position: relative;
            float: right;
            margin-top: -30px;
            margin-right: -17px;
            width: 250px;
            min-height: 175px;
        }

        table#option-price-table {
            margin-top: -2px;
            padding-left: 0;
            font-size: 12px;
            list-style-type: square;
        }

        table#price-table .off-stock-grey {
            color: #9da19f
        }

        .off-stock-info {
            position: absolute;
            color: #9da19f;
            font-size: 12px;
            margin-top: 130px;
            margin-left: 278px;
        }

        /* END PRICE & OPTIONS */
        #footer {
            position: fixed;
            top: 975px;
            height: 90px;
            font-size: 12px;
            color: #fff;
            background-color: #424244;
            text-align: center;
        }

        #footer span {
            font-weight: normal;
            font-size: 10px;
        }

        .address {
            float: left;
            width: 25%;
            height: 80px;
            margin-top: -30px;
            font-weight: bold;
            text-align: left;
            font-size: 11px;
            margin-left: 10px;
        }

        .mask {
            position: fixed;
            top: -80px;
            left: -80px;
            width: 120%;
            height: 120%;
            background-color: rgba(213, 210, 210, 0.6);
            z-index: 9999;
            display: flex;
            justify-content: flex-end;
            align-items: flex-start;
            font-size: 36px;
            font-weight: bold;
            color: #BF2237;
            text-transform: uppercase;
            padding: 20px;
        }

        /* END FOOTEER */
    </style>
</head>

<body>
    <div id="header" class="position-zero">
        <div class="product-name">
            <h1>
                @if ($product->type === 'mobile')
                    {{ __('product.mobile_ramp') }}
                @elseif ($product->type === 'container-access-ramps')
                    {{ __('product.container_access_ramp') }}
                @endif
            </h1>
            <h2>{{ __('product.technical_sheet') }}<</h2>
            <h3>
                {{ $product->name }}
            </h3>
        </div>
        <div class="logo">
            <img src="img/az-machinery-logo.png" alt="Logo">
        </div>
    </div>
    <div id="description" class="position-zero">
        <div class="description-content">
            <h3>{{ __('product.features') }}</h3>
            <p>{{ __('product.' . $product->slug . '.product_description') }}</p>
        </div>
        <div class="image-frame">
            <div class="product-image">
                <img src="{{ asset('img/products/' . $product->base_name . '/pdf/' . $product->base_name . '.jpg') }}"
                    alt="{{$product->base_name}}">
            </div>
        </div>
    </div>
    <div id="technical" class="position-zero">
        <div class="button-container">
            <div class="button-row">
                <div class="button-cell">
                    <a class="button button_1" href="https://az-machinery.ch/get-a-quote"
                        target="_blank">{{ __('product.get_a_quote') }} <i class="icon"> &#x2197;</i></a>
                </div>
                <div class="button-cell">
                    {{-- <a class="button button_2" href="#"
                        target="_blank">{{ __('product.go_to_product') }} <i class="icon"> &#x2197;</i></a> --}}
                </div>
                <div class="button-cell">
                    <a class="button button_3" href="https://az-machinery.ch/contact"
                        target="_blank">{{ __('product.make_a_survey') }} <i class="icon"> &#x2197;</i></a>
                </div>
            </div>
        </div>
        <div class="technical-data">
            <h3>{{ __('product.technical_data') }}</h3>
            <table id="technical-table">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ __('product.weight_capacity') }}</td>
                        <td>{{ $product->weight_capacity }}t</td>
                    </tr>
                    <tr>
                        <td>{{ __('product.total_length') }}</td>
                        <td>{{ $product->total_length }} mm</td>
                    </tr>
                    <tr>
                        <td>{{ __('product.total_width') }}</td>
                        <td>{{ $product->total_width }} mm</td>
                    </tr>
                    <tr>
                        <td>{{ __('product.width_used') }}</td>
                        <td>{{ $product->width_used }} mm</td>
                    </tr>
                    <tr>
                        <td>{{ __('product.length_inclined_plane') }}</td>
                        <td>{{ $product->length_inclined_plane }} mm</td>
                    </tr>
                    <tr>
                        <td>{{ __('product.length_plateform_horizontal') }}</td>
                        <td>{{ $product->length_plateform_horizontal }} mm</td>
                    </tr>
                    <tr>
                        <td>{{ __('product.length_lip_penetrating') }}</td>
                        <td>{{ $product->length_lip_penetrating }} mm</td>
                    </tr>
                    <tr>
                        <td>{{ __('product.exit_lip_length') }}</td>
                        <td>{{ $product->exit_lip_length }} mm</td>
                    </tr>
                    <tr>
                        <td>{{ __('product.slope_min_max') }}</td>
                        <td>{{ $product->slope_min }}% - {{ $product->slope_max }}%</td>
                    </tr>
                    <tr>
                        <td>{{ __('product.lifting_height') }}</td>
                        <td>{{ $product->min_height }} mm - {{ $product->max_height }} mm</td>
                    </tr>
                    <tr>
                        <td>{{ __('product.unloaded_weight') }}</td>
                        <td>{{ $product->unloaded_weight }} kg</td>
                    </tr>
                    <tr>
                        <td>{{ __('product.amount_feet') }}</td>
                        <td>2-4</td>
                    </tr>
                    <tr>
                        <td>{{ __('product.side_railings_height') }}</td>
                        <td>350 mm - 1200 mm</td>
                    </tr>
                    <tr>
                        <td>{{ __('product.security_chaines') }}</td>
                        <td>2</td>
                    </tr>
                    <!-- Repeat the above rows for 14 more times -->
                </tbody>
            </table>
        </div>
        <div class="features">
            <h3>{{ __('product.features') }}</h3>
            <div class="feature-list">
                <ul>
                    <li>{{ __('product.feature._1') }}</li>
                    <li>{{ __('product.feature._2') }}</li>
                    <li>{{ __('product.feature._3') }}</li>
                    <li>{{ __('product.feature._4') }}</li>
                    <li>{{ __('product.feature._5') }}</li>
                    <li>{{ __('product.feature._6') }}</li>
                    <li>{{ __('product.feature._7') }}</li>
                    <li>{{ __('product.feature._8') }}</li>
                </ul>

            </div>
        </div>
    </div>
    <div id="price-options" class="position-zero">
        <div class="price-box">
            <h3>{{ __('product.pricelist') }}</h3>
            <span class="without-tax-info">{{ __('product.price_without_tax') }}</span>
            <span class="off-stock-info off-stock-grey">{{ __('product.ready_to_order') }}</span>
            <table id="price-table">
                <thead>
                    <tr>
                        <th>{{ __('product.tonnes') }}</th>
                        <th>{{ __('product.standard') }}</th>
                        <th>LLO</th>
                        <th>XL</th>
                        <th>LLO XL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>8t</td>
                        <td class="">12 950 € S.I.</td>
                        <td class="">15 250 € S.I.</td>
                        <td class="off-stock-grey">18 550 € S.I.</td>
                        <td class="off-stock-grey">20 750 € S.I.</td>
                    </tr>
                    <tr>
                        <td>10t</td>
                        <td class="">13 450 € S.I.</td>
                        <td class="">15 750 € S.I.</td>
                        <td class="off-stock-grey">18 950 € S.I.</td>
                        <td class="off-stock-grey">21 250 € S.I.</td>
                    </tr>
                    <tr>
                        <td class="">12t</td>
                        <td class="">14 250 € S.I.</td>
                        <td class="">16 950 € S.I.</td>
                        <td class="off-stock-grey">19 950 € S.I.</td>
                        <td class="off-stock-grey">22 050 € S.I.</td>
                    </tr>
                    <tr>
                        <td>15t</td>
                        <td>15 250 € S.I.</td>
                        <td>17 950 € S.I.</td>
                        <td class="off-stock-grey">20 450 € S.I.</td>
                        <td class="off-stock-grey">23 050 € S.I.</td>
                    </tr>
                    <tr>
                        <td>20t</td>
                        <td class="off-stock-grey">16 950 € S.I.</td>
                        <td class="off-stock-grey">19 750 € S.I.</td>
                        <td class="off-stock-grey">20 450 € S.I.</td>
                        <td class="off-stock-grey">24 750 € S.I.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="options-box">
            <h3>{{ __('product.optional.title') }}</h3>
            <table id="option-price-table">
                <thead>
                    <tr>
                        <th>{{ __('product.option') }}</th>
                        <th>{{ __('product.optional.price') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ __('product.optional._1') }}</td>
                        <td>2 000 €</td>
                    </tr>
                    <tr>
                        <td>{{ __('product.optional._2') }}</td>
                        <td>1 000 €</td>
                    </tr>
                    <tr>
                        <td>{{ __('product.optional._3') }}</td>
                        <td>750 €</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div id="footer" class="position-zero">
        <div class="address">
            {{ __('product.ldt') }} <br />
            <span>CG-2, N°80 Planta Baja,</span><br />
            <span> Ed SUNARI-C, AD100</span><br />
            <span>SOLDEU, Andorra</span><br />
            <span>+376 390 036</span>
            {{-- <span>13 rue de la scierie</span><br />
            <span>66340 Palau de cerdagne, Francia</span> --}}
        </div>
        <div class="address">
            AZ Machinery {{ __('product.france') }}<br />
            <span>13 rue de la scierie</span><br />
            <span>66340 Palau de cerdagne</span><br />
            <span>+33 (03) 52 74 03 69</span><br />
            <span>contact@az-machinery.com</span>
        </div>
        <div class="address">
            AZ Machinery {{ __('product.spain') }}<br />
            <span>+34 602 57 01 63</span><br />
            <span>contacto@az-machinery.es</span>
        </div>
        <div class="address">
            AZ Machinery {{ __('product.switzerland') }}<br />
            <span>+41 (0)61 518 14 88</span><br />
            <span>kontakt@az-machinery.ch</span>
        </div>
    </div>
</body>

</html>
