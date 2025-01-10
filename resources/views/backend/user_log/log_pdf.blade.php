<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .user-logs {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="user-logs">
        <h2>User Activity Logs</h2>
        <table>
            <thead>
                <tr>
                    <th>Working Module</th>
                    <th>Update by</th>
                    <th>Event</th>
                    <th>User Role</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($audits as $key=>$audit)
                    <tr>
                        <td>{{ $audit->auditable_type }}</td>
                        <td>{{ $audit->user->name ?? '' }}</td>
                        <td>{{ $audit->event }}</td>
                        <td>
                            @if ($audit->user->roles)
                                @foreach ($audit->user->roles as $role)
                                    <span class="badge border text-primary">{{ $role->name ?? '' }}</span>
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $audit->created_at->format('d-m-Y h:i:s') }}</td>
                    </tr>

                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
