<!-- Update the email template with appropriate HTML structure -->
<h1>Payment Confirmation</h1>

<p>Thank you for your payment. Here are the details of your rentals:</p>

@foreach ($rentals as $rental)
    <div>
        <p>Rental ID: {{ $rental->id }}</p>
        <p>Locker ID: {{ $rental->locker_id }}</p>
        <p>User ID: {{ $rental->user_id }}</p>
        <p>Door ID: {{ $rental->door_id }}</p>
        <p>Start Time: {{ $rental->start_time }}</p>
        <p>End Time: {{ $rental->end_time }}</p>
        <p>Duration: {{ $rental->duration }}</p>
        <p>Price: {{ $rental->price }}</p>
    </div>
@endforeach

<p>Thank you for using our service. If you have any questions, please feel free to contact us.</p>
