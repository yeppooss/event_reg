<?php get_header() ?>
<div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
      <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
        <header class="modal__header">
          <h2 class="modal__title" id="modal-1-title">
            EventName
          </h2>
          <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
        </header>
        <main class="modal__content" id="modal-1-content">
            <div>Start date: <h3 class="start-date">01-01-01</div>
            <div>End date: <h3 class="end-date">01-01-02</div>
            <div><img src="img" class="image" />
            <form id="register_form">
                <div>
                    <div>
                        <input type="text" placeholder="First Name" name="first_name"/>
                    </div>
                    <div>
                        <input type="text" placeholder="Last Name" name="last_name"/>
                    </div>
                    <div>
                        <input type="text" placeholder="Phone number" name="phone_number"/>
                    </div>
                    <input type="hidden" name="event_id"/>
                </div>
                <div style="margin-top: 2em">
                    <button type="submit" class="modal__btn modal__btn-primary">Register</button>
                <div>
            </form>
        </main>
      </div>
    </div>
  </div>
<div id="calendar"></div>
<?php get_footer() ?>