import os
import re

# Define the directory containing your Blade files
html_directory = './resources/views/dashboard'

# Regular expressions to match the static links
css_regex = r'<link\s+.*?href="([^"]+)".*?>'
js_regex = r'<script\s+.*?src="([^"]+)".*?>'
img_regex = r'<img\s+.*?src="([^"]+)".*?>'

def update_asset_links(file_path):
    try:
        with open(file_path, 'r', encoding='utf-8') as file:
            content = file.read()

            # Replace CSS links
            updated_content = re.sub(css_regex, lambda match: f'<link rel="stylesheet" href="{{{{ asset(\'{match.group(1)}\') }}}}">', content)

            # Replace JS links
            updated_content = re.sub(js_regex, lambda match: f'<script src="{{{{ asset(\'{match.group(1)}\') }}}}"></script>', updated_content)

            # Replace image links
            updated_content = re.sub(img_regex, lambda match: f'<img src="{{{{ asset(\'{match.group(1)}\') }}}}"', updated_content)

        with open(file_path, 'w', encoding='utf-8') as file:
            file.write(updated_content)
            print(f"Updated file: {file_path}")
    except Exception as e:
        print(f"Error processing file {file_path}: {e}")

def process_html_files(directory):
    if not os.path.exists(directory):
        print(f"Directory {directory} does not exist.")
        return

    for root, _, files in os.walk(directory):
        for file in files:
            if file.endswith('.blade.php'):
                file_path = os.path.join(root, file)
                update_asset_links(file_path)

if __name__ == "__main__":
    process_html_files(html_directory)
