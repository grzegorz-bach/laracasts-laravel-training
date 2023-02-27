@if(session()->has('success'))
  <div
    class="fixed bottom-3 right-3 bg-green-500 text-sm text-white py-2 px-4 rounded-xl"
    id="toast-success"
	>
    <p>{{ session('success') }}</p>
  </div>
@endif
