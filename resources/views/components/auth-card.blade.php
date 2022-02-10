<div
  class=" xl:bg-contain xl:bg-center min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-r from-red-800  via-gray-900 to-gray-900 ">
  <div>
    {{ $logo }}
  </div>

  <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-100 shadow-md overflow-hidden sm:rounded-lg  ">
    {{ $slot }}
  </div>
</div>