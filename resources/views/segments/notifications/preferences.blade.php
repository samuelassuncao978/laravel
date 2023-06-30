<div class="flex p-5 z-10">
    <div class="flex-grow space-y-1 divide-y divide-gray-200">
        <div class="-mx-3">
            <x-ui.form.field type="toggle" name="settings.sounds" model="settings.sounds" label="Notification sounds"
                description="When important notifications are received like a client check-in a sound will play to notify you." />
        </div>
        <div class="-mx-3">
            <x-ui.form.field type="toggle" name="settings.summaries" model="settings.summaries" label="Email prompts"
                description="When you havent acknowledged your notifications in a while a summary will be sent via email to you." />
        </div>
    </div>
</div>
