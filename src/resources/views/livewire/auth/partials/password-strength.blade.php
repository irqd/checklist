@php
    $isDanger = $score <= 1;
    $isWarning = $score == 2;
    $isSuccess = $score >= 3;
@endphp

<div>
    @if($password)
        <div class="progress">
            <div
                @class([
                    'progress-bar',
                    'bg-danger' => $isDanger,
                    'bg-warning' => $isWarning,
                    'bg-success' => $isSuccess,
                ])

                @style([
                    'width: 20%' => $score == 0,
                    'width: 40%' => $score == 1,
                    'width: 60%' => $score == 2,
                    'width: 80%' => $score == 3,
                    'width: 100%' => $score == 4,
                ])

                role="progressbar"
                aria-label="Progress bar"
                aria-valuenow="{{ $score }}" 
                aria-valuemin="0" 
                aria-valuemax="4"
            ></div>
        </div>
        <div class="text-end">
            <small 
                @class([
                    'fw-bold',
                    'text-danger' => $isDanger,
                    'text-warning' => $isWarning,
                    'text-success' => $isSuccess,
                ])
            >{{ $strength }}</small>
        </div>
    @endif
</div>
