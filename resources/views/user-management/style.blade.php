<style>
    .card-container .grid-margin {
        display: none;
    }

    .c-toggleicon02 {
        position: relative;
        display: inline-block;
        width: 30px;
        /* Reduced width */
        height: 18px;
        /* Reduced height */
    }

    .c-toggleicon02 input {
        opacity: 0;
        width: 30px;
        /* Reduced width */
        height: 18px;
        /* Reduced height */
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
        cursor: pointer;
    }

    .c-toggleicon02 input:checked+.icon {
        background-color: #2196F3;
    }

    .c-toggleicon02 input:checked+.icon:after {
        transform: translateX(10px);
        /* Adjusted position */
    }

    .c-toggleicon02 input:focus+.icon {
        box-shadow: 0 0 1px #2196F3;
    }

    .c-toggleicon02 .icon {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.3s;
        border-radius: 50px;
    }

    .c-toggleicon02 .icon:after {
        position: absolute;
        content: "";
        height: 12px;
        /* Reduced height */
        width: 12px;
        /* Reduced width */
        left: 3px;
        /* Adjusted position */
        bottom: 3px;
        /* Adjusted position */
        background-color: white;
        transition: 0.3s;
        border-radius: 50%;
    }
</style>
