<div class="flex p-5 z-10">
    <div class="flex-grow space-y-1 divide-y divide-gray-200">
        <div class="-mx-3">
            <x-ui.form.field type="toggle" name="settings.initiate" model="settings.initiate"
                label="Allow client messages"
                description="Allow my clients to initiate chat messages with me from their client portal." />
        </div>
        <div class="-mx-3">
            <x-ui.form.field type="toggle" name="settings.sounds" model="settings.sounds"
                label="Message received sounds"
                description="You will be notified by a sound when a new chat message is received." />
        </div>
        <div class="-mx-3">
            <x-ui.form.field type="toggle" name="settings.summaries" model="settings.summaries" label="Email prompts"
                description="When you havent acknowledged your messages in a while a summary will be sent via email to you." />
        </div>
    </div>
</div>
