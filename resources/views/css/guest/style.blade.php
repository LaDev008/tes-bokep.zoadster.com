<style>
    :root {
        --primary-gradient: linear-gradient(45deg, rgba(217, 134, 0, 1) 0%, rgba(212, 143, 1, 1) 13%, rgba(255, 119, 0, 1) 100%);
        --primary-color: rgb(217, 134, 0);
    }

    * {
        padding: 0%;
        margin: 0%;
        box-sizing: border-box;
    }

    body {
        font-family: 'Fjalla One', monospace;
    }

    .navbar-brand {
        color: var(--primary-color) !important;
    }

    .separator {
        width: 100%;
        height: 4px;
        background: var(--primary-gradient);
        margin-block: 10px;
    }

    main {
        color: var(--primary-color) !important;
        margin-top: 135px;
        min-height: calc(100vh - 72px);
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: var(--primary-color) !important;
    }

    .pill-button {
        padding: 4px 20px;
        border-radius: 50px;
        border: solid 2px white;
        background: transparent;
        color: white;
    }

    .pill-button:hover {
        background: var(--primary-gradient);
    }

    @media screen and (min-width: 992px) {
        main {
            margin-top: 150px;
        }
    }
</style>
