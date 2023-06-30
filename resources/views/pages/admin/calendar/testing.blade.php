


<div  class="flex flex-1 overflow-hidden p-3" wire:ignore x-init="
(function(){
            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;
            var calendarEl = document.getElementById('calendar');
            var checkbox = document.getElementById('drop-remove');
            var data =   @this.events;
            var calendar = new Calendar(calendarEl, {

              
                plugins: [
                        window.FullCalendarTimeGrid.default,
                    ],
            
            events: (info,successCallback) =>{
                const events = JSON.parse(data);
                successCallback(events.map((event)=>{
                    console.log(event)
                    return {
                        ...event,
                        backgroundColor: event.is_busy ? '' : event.title === 'available' ? '#7F9A65' : '#666'
                    }
                }))
            },
     
            dateClick(info)  {
               var title = prompt('Enter Event Title');
               var date = new Date(info.dateStr + 'T00:00:00');
               if(title != null && title != ''){
                 calendar.addEvent({
                    title: title,
                    start: date,
                    allDay: true
                  });
                 var eventAdd = {title: title,start: date};
                 @this.addevent(eventAdd);
                 alert('Great. Now, update your database...');
               }else{
                alert('Event Title Is Required');
               }
            },
            editable: false,
            selectable: false,
            displayEventTime: false,
            droppable: false, // this allows things to be dropped onto the calendar
            drop: function(info) {
                // is the remove after drop checkbox checked?
                if (checkbox.checked) {
                // if so, remove the element from the Draggable Events list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
                }
            },
            eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
            loading: function(isLoading) {
                    if (!isLoading) {
                        // Reset custom events
                        this.getEvents().forEach(function(e){
                            if (e.source === null) {
                                e.remove();
                            }
                        });
                    }
                }
            });
            calendar.render();
            @this.on(`refreshCalendar`, () => {
                calendar.refetchEvents()
            });

            calendar.on('dateClick', function(info) {
                console.log('clicked on ' + info.dateStr);
            });

        })


">

<div class="flex-1 overflow-hidden h-full" id='calendar'></div>
    

    @push('scripts')


<link href='https://unpkg.com/@fullcalendar/core@4.1.0/main.css' rel='stylesheet' />
<link href='https://unpkg.com/@fullcalendar/daygrid@4.1.0/main.css' rel='stylesheet' />
<link href='https://unpkg.com/@fullcalendar/timegrid@4.1.0/main.css' rel='stylesheet' />

<script src='https://unpkg.com/@fullcalendar/core@4.1.0/main.js'></script>
<script src='https://unpkg.com/@fullcalendar/daygrid@4.1.0/main.js'></script>
<script src='https://unpkg.com/@fullcalendar/timegrid@4.1.0/main.js'></script>
<script src='https://unpkg.com/@fullcalendar/interaction@4.1.0/main.js'></script>
 
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet' />
    <link href='https://unpkg.com/@fullcalendar/timegrid@4.1.0/main.css' rel='stylesheet' />

    <style>

</style>
@endpush

  </div>

