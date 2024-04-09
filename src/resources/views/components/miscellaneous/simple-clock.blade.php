<div class="d-flex align-items-center">
   <h1 class="fs-1 m-0">
      {{ now()->format('d') }}
   </h1>
   <div>
      <h6 class="m-0 fw-bold fs-sm">
         {{ now()->format('F') }}
      </h6>
      <h6 class="m-0 fw-bold fs-sm">
         {{ now()->format('Y') }}
      </h6>
   </div>
   <div class="mx-1 vr"></div>
   <div x-data="{
      time: '',
      getTime() {
         const today = new Date();
         const h = today.getHours();
         const m = today.getMinutes() < 10 ? '0' + today.getMinutes() : today.getMinutes();
         const s = today.getSeconds() < 10 ? '0' + today.getSeconds() : today.getSeconds();

         this.time = h + ':' + m + ':' + s;

         setTimeout(() => {
            this.getTime();
         }, 1000);
      },
   }" x-init="getTime()">
      <h6 class="m-0 fw-bold fs-sm">
         {{ now()->format('l') }}
      </h6>
      <h6 class="m-0 fw-bold fs-sm" x-text="time">
      </h6>
   </div>
</div>
