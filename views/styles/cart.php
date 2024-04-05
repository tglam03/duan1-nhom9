<link href="<?= BASE_URL; ?>assets/client/css/cart.css" rel="stylesheet">
<style>
    .container_check1 {
        display: block;
        position: relative;
        width: 20%;
        padding-left: 30px;
        line-height: 1.7;
        margin-bottom: 8px;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .container_check1 input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .container_check1 input:checked~.checkmark {
        background-color: #004dda;
        border: 1px solid transparent;
    }

    .container_check1 .checkmark {
        position: absolute;
        top: 0;
        left: 2px;
        height: 20px;
        width: 20px;
        border: 1px solid #dddddd;
        background-color: #fff;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        -ms-border-radius: 3px;
        border-radius: 3px;
        -moz-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        -webkit-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }

    .container_check1 .checkmark:after {
        content: "";
        position: absolute;
        display: none;
        left: 7px;
        top: 3px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 2px 2px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .container_check1 input:checked~.checkmark:after {
        display: block;
    }
</style>