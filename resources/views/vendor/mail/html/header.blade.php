<tr>
  <td class="header">
    <a href="{{ $url }}" style="display: inline-block;">
      @if (trim($slot) === 'Atenas GYM')
      {{-- <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"> --}}
      <img src="{{asset('img/favicon/favicon sin fondo.png')}}" style="width:auto; height:6rem;" alt="Atenas GYM Logo">
      @else
      {{ $slot }}
      @endif
    </a>
  </td>
</tr>