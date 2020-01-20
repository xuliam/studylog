<ul class="list-group menu rounded m-3">
    <li class="list-group-item">
        <a class="btn m-0 p-0" href='{{route('admin.resource')}}'>Video list</a>
    </li>
    <li class="list-group-item">
        <a class="btn m-0 p-0" href='{{route('admin.resource.add', ['type'=>App\Resource::VIDEO])}}'>Add Video</a>
    </li>
    <li class="list-group-item">
        <a class="btn m-0 p-0" href='{{route('admin.resource.add', ['type'=>App\Resource::DOC])}}'>Add Document</a>
    </li>
</ul>
