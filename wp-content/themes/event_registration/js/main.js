jQuery(document).ready(function($){
    $.get(`${window.location.href}/wp-json/registration/v1/events`, (data) => {
        const calendarEl = document.getElementById('calendar')
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            titleFormat: {
                month: 'long',
                year: 'numeric',
                day: 'numeric',
                weekday: 'long'
              },
            events: data,
            eventClick: (info) => {
                $('#modal-1-title').text(info.event.title)
                $('#modal-1-content .start-date').text(moment(info.event.start).format('D-MM-YYYY'))
                $('#modal-1-content .end-date').text(moment(info.event.end).format('D-MM-YYYY'))
                $('#modal-1-content .image').attr('src', info.event._def.extendedProps.image)
                $('#register_form input[name="event_id"').val(info.event.id)
                MicroModal.show('modal-1');
            }
        })
        calendar.render()
    })

    $('#register_form').on('submit', (e) => {
        e.preventDefault()

        const data = $(e.target).serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});

        $.ajax({
            url: `${window.location.href}/wp-json/registration/v1/leads`,
            method: 'post',
            dataType: 'json',
            data: data,
            success: function(data){
                MicroModal.close('modal-1');
            }
        });

    })
    
});