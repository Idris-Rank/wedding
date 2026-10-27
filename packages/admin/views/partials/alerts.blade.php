@if (session('admin_status'))<div class="my-6 border-l-4 border-gold bg-white px-5 py-4 text-sm text-forest shadow-sm">{{ session('admin_status') }}</div>@endif
@if (session('error'))<div class="my-6 border-l-4 border-clay bg-white px-5 py-4 text-sm text-clay shadow-sm">{{ session('error') }}</div>@endif
@if ($errors->any())<div class="my-6 border-l-4 border-clay bg-white px-5 py-4 text-sm text-clay shadow-sm"><p class="font-semibold">Periksa kembali isian berikut:</p><ul class="mt-2 list-disc space-y-1 pl-5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
