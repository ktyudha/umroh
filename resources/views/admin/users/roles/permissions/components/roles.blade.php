<section class="mt-4">
    <h6 class="text-muted mb-3">Roles</h6>

    <div class="flex items-center">
        <input type="checkbox" id="roles_read" name="roles_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->name === 'superadmin') checked @endif disabled>

        <label for="roles_read"
            class="ms-2 text-sm font-medium {{ $role->name === 'superadmin' ? 'text-gray-900 ' : 'text-gray-400' }} ">
            Read roles
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="roles_create" name="roles_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->name === 'superadmin') checked @endif disabled>

        <label for="roles_create"
            class="ms-2 text-sm font-medium {{ $role->name === 'superadmin' ? 'text-gray-900 ' : 'text-gray-400' }} ">
            Create roles
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="roles_edit" name="roles_edit"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->name === 'superadmin') checked @endif disabled>

        <label for="roles_edit"
            class="ms-2 text-sm font-medium {{ $role->name === 'superadmin' ? 'text-gray-900 ' : 'text-gray-400' }} ">
            Edit roles
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="roles_delete" name="roles_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->name === 'superadmin') checked @endif disabled>

        <label for="roles_delete"
            class="ms-2 text-sm font-medium {{ $role->name === 'superadmin' ? 'text-gray-900 ' : 'text-gray-400' }} ">
            Delete roles
        </label>
    </div>

</section>
