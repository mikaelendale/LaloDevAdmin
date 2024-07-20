@extends('layouts.master')

@section('title') Telegram manage @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Telegram @endslot
        @slot('title') Send message @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Send Message to Telegram</h4>
                    <p class="card-title-desc">Use the textarea below to send a formatted message to your Telegram group.</p>

                    <form id="telegramForm">
                        <textarea id="elm1" name="area" rows="10" cols="50" placeholder="Enter your message here"></textarea>
                        <button type="button" onclick="sendMessage()">Send Message</button>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection

@section('script')
    <!--tinymce js-->
    <script src="{{ URL::asset('build/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script>

    <script>
        function sendMessage() {
            const botToken = '7401149514:AAE9eUPAXaPRYSMrH0QxoGC0ZofOKG2E3Qo';
            const chatId = '-1002220480007'; // Replace with your actual group chat ID
            const message = `
*This is italic text*
**This is bold text**
__This is underlined text__
~~This is strikethrough text~~
\`This is inline code\`
> This is a quoted message.
[This is a link](https://example.com)
`;

            const url = `https://api.telegram.org/bot${botToken}/sendMessage`;

            const data = new URLSearchParams();
            data.append('chat_id', chatId);
            data.append('text', message);
            data.append('parse_mode', 'MarkdownV2');

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: data
                })
                .then(response => response.json())
                .then(data => {
                    if (data.ok) {
                        alert('Message sent successfully');
                    } else {
                        console.error('Failed to send message:', data);
                        alert('Failed to send message');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error sending message');
                });
        }
    </script>
@endsection
