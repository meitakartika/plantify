@extends('layout.app')

@section('title', 'About Us | Plantify')

<style>
    /* MISSION */
.mission {
    max-width: 1200px;
    margin: 100px auto;
    padding: 0 24px;
}

.mission-wrapper {
    display: flex;
    align-items: flex-start;
    margin: 0 auto;
    gap: 80px;
}

.mission-left {
    flex: 1;
    max-width: 480px;
}

.mission-right {
    flex: 1;
    max-width: 580px;
}

.label {
    color: #4CBA9B;
    font-size: 16px;
    font-weight: 500;
    margin-bottom: 16px;
}

.mission h2 {
    font-size: 32px;
    font-weight: 700;
    color: #1E1E1E;
    margin-bottom: 30px;
}

.mission-stats {
    display: flex;
    gap: 40px;
}

.mission-stats > div {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

.mission-stats strong {
    font-size: 24px;
    font-weight: 600;
}

.mission-stats span {
    display: block;
    font-size: 14px;
    color: rgba(30,30,30,.6);
}

.mission-item {
    display: flex;
    align-items: flex-start;
    gap: 24px;
    margin-bottom: 32px;
}

.mission-item i {
    min-width: 44px;
    height: 44px;
    background: #1D2F33;
    color: #7EC676;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 30px;
    font-size: 18px;
}

.mission-item h4 {
    font-size: 20px;
    font-weight: 500;
    margin-bottom: 8px;
}

.mission-item p {
    font-size: 16px;
    color: rgba(30,30,30,.6);
    line-height: 1.6;
}

/* FAQ */
.faq {
    background: #EBF5F3;
    padding: 80px 24px;
    text-align: center;
}

.faq h2 {
    font-size: 32px;
    font-weight: 700;
    color: #1E1E1E;
    margin-bottom: 40px;
}

.faq-list {
    max-width: 800px;
    margin: auto;
    text-align: left;
}

.faq-item {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    margin-bottom: 16px;
    overflow: hidden;
}

.faq-item.active p {
    margin-top: 12px;
    color: rgba(30,30,30,.6);
}

.faq-icon {
    background: #7EC676;
    color: #000;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    transition: transform 0.3s ease;
}


.faq-question {
    width: 100%;
    background: none;
    border: none;
    padding: 20px;
    font-size: 16px;
    font-weight: 600;
    text-align: left;
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
}

.faq-question .icon {
    font-size: 20px;
    transition: transform 0.3s;
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    padding: 0 20px;
}

.faq-answer p {
    margin: 12px 0 20px;
    color: rgba(30,30,30,.6);
    line-height: 1.6;
}

.faq-item.active .faq-answer {
    max-height: 200px;
}

.faq-item.active .faq-icon {
    transform: rotate(180deg);
}

/* CONTACT */
.contact {
    padding: 100px 24px;
}

.contact-wrapper {
    max-width: 1200px;
    margin: auto;
    display: flex;
    gap: 40px;
}

.contact-info {
    width: 35%;
}

.info-card {
    background: #1D2F33;
    color: #fff;
    padding: 32px;
    border-radius: 24px;
}

.info-item {
    display: flex;
    gap: 16px;
    align-items: flex-start;
}

.info-item:not(:last-child) {
    margin-bottom: 32px;
}

.icon-circle {
    width: 44px;
    height: 44px;
    background: #7EC676;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.icon-circle i {
    font-size: 18px;
    color: #1D2F33;
}

.info-text h4 {
    color: #4CBA9B;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 8px;
    margin-top: 8px;
}

.info-text p {
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 6px;
    color: #E5EDED;
}

.info-text span {
    font-size: 14px;
    font-weight: 500;
    color: #fff;
}

.contact-form {
    flex: 1;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
}


.contact-form textarea {
    grid-column: span 3;
    height: 130px;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 14px 16px;
    border: 1.5px solid rgba(0,0,0,0.15);
    border-radius: 8px;
    background: transparent;
    font-size: 16px;
    color: #1D2F33;
    outline: none;
}

.contact-form input:focus,
.contact-form textarea:focus {
    border-color: #4CBA9B;
}

.contact-form input::placeholder,
.contact-form textarea::placeholder {
    color: rgba(29,47,51,.5);
}

.contact-form button {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 24px;
        background: #4CBA9B;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.2s ease;
        justify-content: center;
    }

    .contact-form button::after {
        content: "→";
        font-size: 24px;
        line-height: 1;
        margin-left: 4px;
        display: flex;
        align-items: center;
    }

    .contact-form button:hover {
        background: #EBF5F3;
    }

    @media (max-width: 992px) {

    /* MISSION */
    .mission-wrapper {
        flex-direction: column;
        gap: 48px;
    }

    .mission-left,
    .mission-right {
        max-width: 100%;
    }

    .mission-stats {
        justify-content: flex-start;
    }

    /* FAQ */
    .faq {
        padding: 64px 24px;
    }

    /* CONTACT */
    .contact-wrapper {
        flex-direction: column;
        gap: 40px;
    }

    .contact-info {
        width: 100%;
    }

    .contact-form {
        grid-template-columns: repeat(2, 1fr);
    }

    .contact-form textarea {
        grid-column: span 2;
    }
}

@media (max-width: 576px) {

    /* MISSION */
    .mission {
        margin: 64px auto;
    }

    .mission h2 {
        font-size: 26px;
    }

    .mission-stats {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }

    .mission-stats > div {
        align-items: flex-start;
        text-align: left;
    }

    .mission-item {
        gap: 16px;
    }

    .mission-item h4 {
        font-size: 18px;
    }

    /* FAQ */
    .faq h2 {
        font-size: 26px;
    }

    .faq-question {
        padding: 16px;
        font-size: 15px;
    }

    /* CONTACT */
    .contact {
        padding: 64px 16px;
    }

    .info-card {
        padding: 24px;
    }

    .contact-form {
        grid-template-columns: 1fr;
    }

    .contact-form textarea {
        grid-column: span 1;
    }

    .contact-form button {
        justify-self: center;
    }
}
</style>

@section('content')
<!-- OUR MISSION -->
<section class="mission">
    <div class="mission-wrapper">
        <div class="mission-left">
            <p class="label">OUR MISSION</p>
            <h2>Helping You Find the<br>Right Plants</h2>

            <div class="mission-stats">
                <div>
                    <strong>4+</strong>
                    <span>Years Experience</span>
                </div>
                <div>
                    <strong>50+</strong>
                    <span>Plant Species</span>
                </div>
                <div>
                    <strong>300+</strong>
                    <span>Customers</span>
                </div>
            </div>
        </div>

        <div class="mission-right">
            <div class="mission-item">
                <i class="bi bi-flower1"></i>
                <div>
                    <h4>Large Assortment</h4>
                    <p>From indoor to outdoor, we offer a diverse selection of plants to suit every space and lifestyle.</p>
                </div>
            </div>

            <div class="mission-item">
                <i class="bi bi-box"></i>
                <div>
                    <h4>Fast & Free Shipping</h4>
                    <p>Your plants are carefully packed and delivered fresh to your door with safe and reliable shipping.</p>
                </div>
            </div>

            <div class="mission-item">
                <i class="bi bi-telephone-outbound"></i>
                <div>
                    <h4>24/7 Support</h4>
                    <p>Need help choosing or caring for your plants? Our support team is always ready to assist you anytime.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="faq">
    <p class="label">FAQ</p>
    <h2>Frequently asked questions</h2>

    <div class="faq-list">

    <div class="faq-item">
        <button class="faq-question">
            How do I take care of my plants?
            <i class="bi bi-chevron-down faq-icon"></i>
        </button>
        <div class="faq-answer">
            <p>Each plant comes with simple care instructions to help it grow healthy.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">
            Do you offer fast delivery?
            <i class="bi bi-chevron-down faq-icon"></i>
        </button>
        <div class="faq-answer">
            <p>Yes, we provide fast and reliable delivery to ensure your plants arrive fresh and safely.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">
            Can I return damaged plants?
            <i class="bi bi-chevron-down faq-icon"></i>
        </button>
        <div class="faq-answer">
            <p>If your plant arrives damaged, you can contact our support team for a replacement or refund.</p>
        </div>
    </div>

    <div class="faq-item">
        <button class="faq-question">
            Do you provide plant care support?
            <i class="bi bi-chevron-down faq-icon"></i>
        </button>
        <div class="faq-answer">
            <p>Absolutely! Our support team is available 24/7 to help you with plant care questions.</p>
        </div>
    </div>

</div>
</section>

<!-- CONTACT -->
<section class="contact">
    <div class="contact-wrapper">
        <div class="contact-info">
    <div class="info-card">
        <div class="info-item">
            <div class="icon-circle">
                <i class="bi bi-telephone"></i>
            </div>
            <div class="info-text">
                <h4>Call To Us</h4>
                <p>We are available 24/7, 7 days a week.</p>
                <span>Phone: +88061112222</span>
            </div>
        </div>

        <div class="info-item">
            <div class="icon-circle">
                <i class="bi bi-envelope"></i>
            </div>
            <div class="info-text">
                <h4>Write To Us</h4>
                <p>Fill out our form and we will contact you within 24 hours.</p>
                <span>Email: support@plantify.com</span>
            </div>
        </div>
    </div>
</div>

        <form class="contact-form">
            <input type="text" placeholder="Your Name *">
            <input type="email" placeholder="Your Email *">
            <input type="text" placeholder="Your Phone *">
            <textarea placeholder="Your Message"></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.faq-question').forEach(button => {
        button.addEventListener('click', () => {
            const item = button.parentElement;

            document.querySelectorAll('.faq-item').forEach(faq => {
                if (faq !== item) faq.classList.remove('active');
            });

            item.classList.toggle('active');
        });
    });
</script>
@endpush