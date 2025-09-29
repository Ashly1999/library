<!-- @if($i % 2==0)
even is {{$i}}
@else
odd is {{$i}}
@endif -->

<h3>Word: {{ $rty }}</h3>
<h3>Reverse: {{ $reverse }}</h3>
@if($rty==$reverse)
{{$rty}} is palindrome
@else
{{$rty}} is not palindrome
@endif