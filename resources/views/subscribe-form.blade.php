<form method="POST" action="{{ route('mailchimp.subscribe') }}">
    @csrf
    <input type="email" name="email" placeholder="Enter your email" required>
    <button type="submit">Subscribe</button>
</form>
@if(session('status'))
    <p>{{ session('status') }}</p>
@endif
