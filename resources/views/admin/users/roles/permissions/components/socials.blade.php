<section class="mt-4">
    <h6 class="text-muted mb-3">Socials</h6>

    <div class="flex items-center">
        <input type="checkbox" id="socials_read" name="socials_read"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('socials read') or $role->name === 'superadmin') checked @endif>

        <label for="socials_read" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Read socials
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="socials_create" name="socials_create"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('socials create') or $role->name === 'superadmin') checked @endif>

        <label for="socials_create" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Create socials
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="socials_update" name="socials_update"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('socials update') or $role->name === 'superadmin') checked @endif>

        <label for="socials_update" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Edit socials
        </label>
    </div>

    <div class="flex items-center">
        <input type="checkbox" id="socials_delete" name="socials_delete"
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
            @if ($role->hasPermissionTo('socials delete') or $role->name === 'superadmin') checked @endif>

        <label for="socials_delete" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Delete socials
        </label>
    </div>

</section>
