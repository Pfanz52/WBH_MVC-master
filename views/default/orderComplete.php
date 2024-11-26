<div class="container">
    <h1>Order Details</h1>
    <div class="order-summary">
        <div>
            <strong>Order ID:</strong><br> #12345
        </div>
        <div>
            <strong>Date:</strong><br> 2024-11-26
        </div>
        <div>
            <strong>Status:</strong><br> Confirmed
        </div>
    </div>

    <table class="details-table">
        <thead>
        <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Product 1</td>
            <td>2</td>
            <td>$20.00</td>
            <td>$40.00</td>
        </tr>
        <tr>
            <td>Product 2</td>
            <td>1</td>
            <td>$15.00</td>
            <td>$15.00</td>
        </tr>
        <tr>
            <td>Product 3</td>
            <td>3</td>
            <td>$10.00</td>
            <td>$30.00</td>
        </tr>
        </tbody>
    </table>
    <div class="total">
        Total: $85.00
    </div>
    <div class="button">
        <a href="#">Back to Orders</a>
    </div>
</div>
<style>
    .container {
        max-width: 800px;
        margin: 20px auto;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }
    h1 {
        text-align: center;
        color: #333;
    }
    .order-summary {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        border-bottom: 2px solid #ddd;
        padding-bottom: 10px;
    }
    .order-summary div {
        flex: 1;
        text-align: center;
    }
    .details-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    .details-table th, .details-table td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: left;
    }
    .details-table th {
        background-color: #f8f8f8;
        color: #333;
    }
    .details-table tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .total {
        text-align: right;
        font-size: 1.2em;
        margin: 20px 0;
        font-weight: bold;
    }
    .button {
        text-align: center;
    }
    .button a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 10px;
    }
    .button a:hover {
        background-color: #45a049;
    }

</style>