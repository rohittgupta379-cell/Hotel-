<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background-color: #f2f5ed;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-family: serif;
            font-size: 4rem;
            color: #1e3c34;
            margin: 0;
        }

        .header p {
            color: #1e3c34;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 2px;
        }

        .container {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 30px;
            max-width: 1100px;
            margin: auto;
            position: relative;
        }

        /* Responsive Images */
        .food-img {
            display: none;
        }

        /* Hide decorative images on mobile */

        .section-title {
            color: #d4a017;
            font-size: 1.5rem;
            margin-bottom: 15px;
            border-bottom: 1px solid #d4a017;
        }

        .item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .name {
            font-weight: bold;
        }

        .desc {
            font-style: italic;
            font-size: 0.85rem;
            color: #555;
        }

        .price {
            font-weight: bold;
        }

        /* Tablet/Desktop Styles */
        @media (min-width: 768px) {
            .food-img {
                display: block;
                position: absolute;
                width: 180px;
            }

            .img-top-left {
                top: -20px;
                left: -200px;
            }

            .img-top-right {
                top: -20px;
                right: -200px;
            }

            .img-bot-left {
                bottom: 0;
                left: -200px;
            }

            .img-bot-right {
                bottom: 0;
                right: -200px;
            }
        }

        /* Mobile Styles */
        @media (max-width: 767px) {
            .container {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .header h1 {
                font-size: 3rem;
            }
        }

        /* Modal Overlay */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(30, 60, 52, 0.7);
            backdrop-filter: blur(5px);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            animation: fadeIn 0.3s ease;
        }

        .modal-content {
            background: #fff;
            padding: 30px;
            border-radius: 20px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .modal-title {
            color: #1e3c34;
            margin: 0 0 5px;
            font-family: serif;
        }

        .modal-subtitle {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
            flex: 1;
        }

        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        input,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1rem;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            background: #d4a017;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background: #b88a13;
        }

        .cancel-btn {
            background: none;
            border: none;
            color: #999;
            width: 100%;
            margin-top: 15px;
            cursor: pointer;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <div class="header">
        <h1>MENU</h1>
        <p>RESTAURANT & BAR</p>
    </div>

    <div class="container">
        <!-- Images: Only visible on larger screens -->
        <img src="https://static.vecteezy.com/system/resources/thumbnails/036/333/937/small/ai-generated-yummy-street-food-burger-isolated-png.png"
            class="food-img img-top-left" alt="Burger">
        <img src="https://png.pngtree.com/png-vector/20240712/ourmid/pngtree-food-bowl-vegetable-salad-png-image_13052209.png"
            class="food-img img-top-right" alt="Salad">
        <img src="https://png.pngtree.com/png-clipart/20250429/original/pngtree-hot-and-crispy-french-fries-in-red-box-png-image_20891964.png"
            class="food-img img-bot-left" alt="Fries">
        <img src="https://static.vecteezy.com/system/resources/thumbnails/069/941/701/small/delicious-cake-topped-with-raspberries-and-mint-leaves-on-transparent-background-png.png"
            class="food-img img-bot-right" alt="Dessert">

        <!-- Inside your <div class="container"> -->
        @foreach ($categories->chunk(1) as $chunk)
            <!-- This will render each category group -->
            @foreach ($chunk as $category)
                <div>
                    <h2 class="section-title">{{ $category->name }}</h2>

                    @foreach ($category->foods as $food)
                        <div class="item" onclick="openModal('{{ $food->id }}', '{{ $food->name }}')">
                            <div>
                                <div class="name">{{ $food->name }}</div>
                                <div class="desc">{{ $food->description }}</div>
                            </div>
                            <div class="price">Rs.{{ $food->price }}</div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endforeach
    </div>

    <div id="orderModal" class="modal-overlay">
        <div class="modal-content">
            <h2 class="modal-title" id="modalFoodName">Order Item</h2>
            <p class="modal-subtitle">Please enter your details below.</p>

            <form action="/food-order" method="POST" class="order-form">
                @csrf
                <input type="hidden" name="food_id" id="food_id">

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" required placeholder="Enter your name">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="mobile" required placeholder="Phone number">
                    </div>
                    <div class="form-group">
                        <label>Room No</label>
                        <input type="text" name="room_no" required placeholder="e.g. 101">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" name="quantity" value="1" min="1" required>
                    </div>
                    <div class="form-group">
                        <label>Payment</label>
                        <select name="payment_method">
                            <option value="cash">Cash</option>
                            <option value="online">Online</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="submit-btn">Confirm Order</button>
                <button type="button" onclick="closeModal()" class="cancel-btn">Cancel</button>
            </form>
        </div>
    </div>

    <style>
        .popup-modal {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 360px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .25);
            z-index: 99999;
            overflow: hidden;
            animation: slideIn .4s;
        }

        .popup-header {
            padding: 14px 18px;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
        }

        .success {
            background: #198754;
        }

        .error {
            background: #dc3545;
        }

        .popup-body {
            padding: 18px;
            font-size: 15px;
        }

        .popup-body ul {
            margin: 10px 0 0;
            padding-left: 20px;
        }

        .popup-close {
            float: right;
            cursor: pointer;
            font-size: 22px;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>

    @if (session('success'))
        <div id="successModal" class="popup-modal">

            <div class="popup-header success">

                Success

                <span class="popup-close" onclick="closePopup('successModal')">&times;</span>

            </div>

            <div class="popup-body">

                ✅ {{ session('success') }}

            </div>

        </div>
    @endif

    @if (session('error'))
        <div id="errorModal" class="popup-modal">

            <div class="popup-header error">

                Error

                <span class="popup-close" onclick="closePopup('errorModal')">&times;</span>

            </div>

            <div class="popup-body">

                ❌ {{ session('error') }}

            </div>

        </div>
    @endif

    @if ($errors->any())

        <div id="validationModal" class="popup-modal">

            <div class="popup-header error">

                Validation Error

                <span class="popup-close" onclick="closePopup('validationModal')">&times;</span>

            </div>

            <div class="popup-body">

                <ul>

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        </div>

    @endif

</body>
<script>
    function openModal(id, name) {
        document.getElementById('food_id').value = id;
        document.getElementById('modalFoodName').innerText = name;
        document.getElementById('orderModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('orderModal').style.display = 'none';
    }

    // Close when clicking outside the box
    window.onclick = function(event) {
        if (event.target == document.getElementById('orderModal')) closeModal();
    }
</script>
<script>

function closePopup(id){
    document.getElementById(id).style.display="none";
}

setTimeout(function(){

    if(document.getElementById('successModal'))
        closePopup('successModal');

    if(document.getElementById('errorModal'))
        closePopup('errorModal');

    if(document.getElementById('validationModal'))
        closePopup('validationModal');

},5000);

</script>

</html>
