<footer class="py-4 footer-custom">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-center small">
            Copyright &copy; Vuongcoffee <span id="currentYear" class="year-bold"></span>
        </div>
    </div>
</footer>

<style>
    .footer-custom {
        background-color: #ffffff; /* Màu nâu sẫm */
        color: #ffffff; /* Màu trắng */
        padding: 0;
        text-align: center;
        box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.1);
        width: 100%;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .footer-custom:hover {
        background-color: #f0d593;
        color: #000000;
    }

    .footer-custom .container-fluid {
        padding: 0;
    }

    .footer-custom .small {
        font-size: 0.9rem;
    }

    .footer-custom .year-bold {
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .footer-custom:hover .year-bold {
        color: #000000;
    }
</style>
