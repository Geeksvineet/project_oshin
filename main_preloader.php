<style>
    .cat {
        position: relative;
        width: 100%;
        max-width: 20em;
        overflow: hidden;
        background-color: #e6dcdc;
        background-image: url('client/assets/images/ball-removebg-preview.png');
        background-size: 60px;
        background-repeat: no-repeat;
        background-position: center;
      }
      .cat::before {
        content: "";
        display: block;
        padding-bottom: 100%;
      }
      .cat:hover > * {
        animation-play-state: running;
      }
      .cat:active > * {
        animation-play-state: running;
      }
      .cat__head,
      .cat__tail,
      .cat__body {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        animation: rotating 2.79s cubic-bezier(0.65, 0.54, 0.12, 0.93) infinite;
      }
      .cat__head::before,
      .cat__tail::before,
      .cat__body::before {
        content: "";
        position: absolute;
        width: 50%;
        height: 50%;
        background-size: 200%;
        background-repeat: no-repeat;
        background-image: url("client/assets/images/image-ca-loader-removebg-preview.png");
      }
      .cat__head::before {
        top: 0;
        right: 0;
        background-position: 100% 0%;
        transform-origin: 0% 100%;
        transform: rotate(90deg);
      }
      .cat__tail {
        animation-delay: 0.2s;
      }
      .cat__tail::before {
        left: 0;
        bottom: 0;
        background-position: 0% 100%;
        transform-origin: 100% 0%;
        transform: rotate(-30deg);
      }
      .cat__body {
        animation-delay: 0.1s;
      }
      .cat__body:nth-of-type(2) {
        animation-delay: 0.2s;
      }
      .cat__body::before {
        right: 0;
        bottom: 0;
        background-position: 100% 100%;
        transform-origin: 0% 0%;
      }
      @keyframes rotating {
        from {
          transform: rotate(720deg);
        }
        to {
          transform: none;
        }
      }
      .box {
        display: flex;
        flex: 1;
        flex-direction: column;
        justify-content: flex-start;
        justify-content: center;
        align-items: center;
        /* background-color: #e6dcdc; */
      }
      *,
      *::before,
      *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      html {
        height: 100%;
      }
      body {
        display: flex;
        flex-direction: column;
        min-height: 100%;
        margin: 0;
        line-height: 1.4;
      }
      .intro {
        width: 90%;
        max-width: 36rem;
        padding-bottom: 1rem;
        margin: 0 auto 1em;
        padding-top: 0.5em;
        font-size: calc(1rem + 2vmin);
        text-transform: capitalize;
        border-bottom: 1px dashed rgba(0, 0, 0, 0.3);
        text-align: center;
      }
      .intro small {
        display: block;
        opacity: 0.5;
        font-style: italic;
        text-transform: none;
      }
      .info {
        margin: 0;
        padding: 1em;
        font-size: 0.9em;
        font-style: italic;
        font-family: serif;
        text-align: right;
        opacity: 0.5;
      }
      .info a {
        color: inherit;
      }
</style>

<div class="preloader">
      <div class="box">
        <!-- <img width="20%"  src="bracketweb.com/kidearn-html/assets/images/ball-removebg-preview.png" alt=""> -->
        <div class="cat">
          <!-- <img src="bracketweb.com/kidearn-html/assets/images/ball-removebg-preview.png" alt=""> -->
          <div class="cat__body"></div>
          <div class="cat__body"></div>
          <div class="cat__tail"></div>
          <div class="cat__head"></div>
        </div>
      </div>
    </div>