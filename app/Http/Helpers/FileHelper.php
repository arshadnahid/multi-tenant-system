<?php

use Illuminate\Support\Facades\Cache;

if (!function_exists('uploaded_asset')) {
    /**
     * Get uploaded asset URL with caching
     *
     * @param int|null $id Upload ID
     * @return string Asset URL
     */
    function uploaded_asset($id)
    {
        if (!$id) {
            return static_asset('assets/img/placeholder.svg');
        }

        return Cache::remember("upload_asset_{$id}", now()->addMinutes(60), function () use ($id) {
            $asset = \App\Models\Upload::find($id);
            return $asset ? ($asset->external_link ?? my_asset($asset->file_name)) : static_asset('assets/img/placeholder.svg');
        });
    }
}

if (!function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param string $path
     * @param bool|null $secure
     * @return string
     */
    function my_asset($path, $secure = null)
    {
        if (env('FILESYSTEM_DRIVER') != 'local') {
            return \Illuminate\Support\Facades\Storage::disk(env('FILESYSTEM_DRIVER'))->url($path);
        }

        return app('url')->asset('public/' . $path, $secure);
    }
}


if (!function_exists('static_asset')) {

    function static_asset($path, $secure = null)
    {
        //database upload remove this condition if
        if (env('APP_ENV') == 'local') {
            return app('url')->asset($path, $secure);
        }
        return app('url')->asset('public/' . $path, $secure);

    }
}

if (!function_exists('get_file_extension')) {
    /**
     * Get file extension from filename
     *
     * @param string $filename
     * @return string
     */
    function get_file_extension($filename)
    {
        return strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    }
}

if (!function_exists('is_image_file')) {
    /**
     * Check if file is an image
     *
     * @param string $filename
     * @return bool
     */
    function is_image_file($filename)
    {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp'];
        return in_array(get_file_extension($filename), $imageExtensions);
    }
}

if (!function_exists('format_file_size')) {
    /**
     * Format file size in human readable format
     *
     * @param int $bytes
     * @return string
     */
    function format_file_size($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } else {
            return $bytes . ' bytes';
        }
    }
}

if (!function_exists('get_file_type_icon')) {
    /**
     * Get icon class for file type
     *
     * @param string $filename
     * @return string
     */
    function get_file_type_icon($filename)
    {
        $extension = get_file_extension($filename);

        $icons = [
            // Images
            'jpg' => 'fas fa-image',
            'jpeg' => 'fas fa-image',
            'png' => 'fas fa-image',
            'gif' => 'fas fa-image',
            'bmp' => 'fas fa-image',
            'svg' => 'fas fa-image',
            'webp' => 'fas fa-image',

            // Documents
            'pdf' => 'fas fa-file-pdf',
            'doc' => 'fas fa-file-word',
            'docx' => 'fas fa-file-word',
            'xls' => 'fas fa-file-excel',
            'xlsx' => 'fas fa-file-excel',
            'ppt' => 'fas fa-file-powerpoint',
            'pptx' => 'fas fa-file-powerpoint',
            'txt' => 'fas fa-file-alt',

            // Archives
            'zip' => 'fas fa-file-archive',
            'rar' => 'fas fa-file-archive',
            '7z' => 'fas fa-file-archive',
            'tar' => 'fas fa-file-archive',
            'gz' => 'fas fa-file-archive',

            // Audio
            'mp3' => 'fas fa-file-audio',
            'wav' => 'fas fa-file-audio',
            'flac' => 'fas fa-file-audio',
            'aac' => 'fas fa-file-audio',

            // Video
            'mp4' => 'fas fa-file-video',
            'avi' => 'fas fa-file-video',
            'mov' => 'fas fa-file-video',
            'wmv' => 'fas fa-file-video',
            'flv' => 'fas fa-file-video',
            'webm' => 'fas fa-file-video',

            // Code
            'php' => 'fas fa-file-code',
            'js' => 'fas fa-file-code',
            'css' => 'fas fa-file-code',
            'html' => 'fas fa-file-code',
            'json' => 'fas fa-file-code',
            'xml' => 'fas fa-file-code',
        ];

        return $icons[$extension] ?? 'fas fa-file';
    }
}

if (!function_exists('sanitize_filename')) {
    /**
     * Sanitize filename for safe storage
     *
     * @param string $filename
     * @return string
     */
    function sanitize_filename($filename)
    {
        // Get file extension
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $name = pathinfo($filename, PATHINFO_FILENAME);

        // Remove special characters and spaces
        $name = preg_replace('/[^a-zA-Z0-9\-_]/', '_', $name);

        // Remove multiple underscores
        $name = preg_replace('/_+/', '_', $name);

        // Trim underscores from start and end
        $name = trim($name, '_');

        // Ensure name is not empty
        if (empty($name)) {
            $name = 'file_' . time();
        }

        return $name . ($extension ? '.' . $extension : '');
    }
}

if (!function_exists('generate_unique_filename')) {
    /**
     * Generate unique filename to prevent conflicts
     *
     * @param string $filename
     * @param string $directory
     * @return string
     */
    function generate_unique_filename($filename, $directory = 'uploads')
    {
        $sanitized = sanitize_filename($filename);
        $extension = pathinfo($sanitized, PATHINFO_EXTENSION);
        $name = pathinfo($sanitized, PATHINFO_FILENAME);

        $counter = 1;
        $newFilename = $sanitized;

        while (file_exists(public_path($directory . '/' . $newFilename))) {
            $newFilename = $name . '_' . $counter . ($extension ? '.' . $extension : '');
            $counter++;
        }

        return $newFilename;
    }
}
