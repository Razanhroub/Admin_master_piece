{{-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
        stroke-miterlimit="10" stroke="#F96D00" />
</svg></div> --}}

{{-- <div id="ftco-loader" class="show fullscreen">
    <svg xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 32 32" class="rotating-icon">
        <path fill="#FF5733" d="m10.096 18.5l-6.037 5.493l-.034.032a3.5 3.5 0 1 0 4.982 4.916l5.785-6.358l-3.527-4.083zm7.404-6.86v.625l3.788 3.273c.218-.119.505-.195.852-.211c1.302-.06 2.705-.47 3.94-1.023c1.232-.55 2.386-1.284 3.163-2.061a6 6 0 0 0-8.485-8.486c-.777.778-1.51 1.932-2.061 3.163c-.553 1.235-.962 2.638-1.023 3.94a2.1 2.1 0 0 1-.174.78m4-3.64a1 1 0 0 1 1 1a1.5 1.5 0 0 0 1.5 1.5a1 1 0 1 1 0 2A3.5 3.5 0 0 1 20.5 9a1 1 0 0 1 1-1M5.929 3.172a4 4 0 0 1 5.657 0l3.242 3.242A4 4 0 0 1 16 9.242v3.71l11.802 10.193l.026.026a4 4 0 0 1-5.657 5.657l-.026-.026L11.952 17h-3.71a4 4 0 0 1-2.828-1.172l-3.242-3.242a4 4 0 0 1 0-5.657zm3.778 3.12a1 1 0 0 0-1.414 1.415l2.25 2.25a1 1 0 0 0 1.414-1.414zm-4.414 3a1 1 0 0 0 0 1.415l2.25 2.25a1 1 0 0 0 1.414-1.414l-2.25-2.25a1 1 0 0 0-1.414 0"/>
    </svg>
</div>

<style>
    body, html {
        height: 100%;
        margin: 0;
    }

    .fullscreen {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    #ftco-loader {
        animation: fadeOut 10s forwards;
    }

    .rotating-icon {
        animation: rotateShake 0.5s infinite;
    }

    @keyframes fadeOut {
        0% { opacity: 1; }
        100% { opacity: 0; }
    }

    @keyframes rotateShake {
        0%, 100% { transform: rotate(0deg); }
        25% { transform: rotate(-10deg); }
        50% { transform: rotate(10deg); }
        75% { transform: rotate(-10deg); }
    }
</style> --}}
<div id="ftco-loader" class="show fullscreen">
    <svg xmlns="http://www.w3.org/2000/svg" width="48px" height="48px" viewBox="0 0 32 32" class="rotating-icon">
        <path fill="#FF5733" d="m10.096 18.5l-6.037 5.493l-.034.032a3.5 3.5 0 1 0 4.982 4.916l5.785-6.358l-3.527-4.083zm7.404-6.86v.625l3.788 3.273c.218-.119.505-.195.852-.211c1.302-.06 2.705-.47 3.94-1.023c1.232-.55 2.386-1.284 3.163-2.061a6 6 0 0 0-8.485-8.486c-.777.778-1.51 1.932-2.061 3.163c-.553 1.235-.962 2.638-1.023 3.94a2.1 2.1 0 0 1-.174.78m4-3.64a1 1 0 0 1 1 1a1.5 1.5 0 0 0 1.5 1.5a1 1 0 1 1 0 2A3.5 3.5 0 0 1 20.5 9a1 1 0 0 1 1-1M5.929 3.172a4 4 0 0 1 5.657 0l3.242 3.242A4 4 0 0 1 16 9.242v3.71l11.802 10.193l.026.026a4 4 0 0 1-5.657 5.657l-.026-.026L11.952 17h-3.71a4 4 0 0 1-2.828-1.172l-3.242-3.242a4 4 0 0 1 0-5.657zm3.778 3.12a1 1 0 0 0-1.414 1.415l2.25 2.25a1 1 0 0 0 1.414-1.414zm-4.414 3a1 1 0 0 0 0 1.415l2.25 2.25a1 1 0 0 0 1.414-1.414l-2.25-2.25a1 1 0 0 0-1.414 0"/>
    </svg>
</div>

<style>
    body, html {
        height: 100%;
        margin: 0;
    }

    .fullscreen {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    #ftco-loader {
        animation: fadeOut 10s forwards !important; /* Apply important to ensure priority */
    }

    .rotating-icon {
        animation: rotateShake 0.5s infinite !important; /* Ensure the animation continues */
    }

    @keyframes fadeOut {
        0% { opacity: 1; }
        100% { opacity: 0; } /* Fully fades out */
    }

    @keyframes rotateShake {
        0%, 100% { transform: rotate(0deg); }
        25% { transform: rotate(-10deg); }
        50% { transform: rotate(10deg); }
        75% { transform: rotate(-10deg); }
    }
</style>