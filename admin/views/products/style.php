<style>
    img {
        width: 90%;
        height: 50%;
        object-fit: contain;
        vertical-align: middle;
    }
    .btnhinhtron{
        width: 20px;
        height: 20px;
        border-radius: 50%;
    }
    /* Slideshow container */
    .slideshow-container {
        max-width: 300px;
        position: relative;
        margin: auto;
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        font-weight: bold;
        text-align: center;
        margin-bottom: 5%;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        font-weight: bold;
        color: black;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        height: 10px;
        width: 10px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.5s ease;
    }

    .active {
        background-color: #666;
    }

    /* Fading animation */
    .fade {
        animation-name: fade;
        animation-duration: 1s;
    }

    @keyframes fade {
        from {
            opacity: .4
        }

        to {
            opacity: 1
        }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
        .text {
            font-size: 11px
        }
    }
    td{
        text-align: center;
    }
</style>