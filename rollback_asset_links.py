import os
import re

# Define the directory containing your Blade files
html_directory = './resources/views/dashboard'

# Regular expression to match the {{ asset('...') }} syntax
asset_regex = r'{{\s*asset\(\s*[\'"]([^\'"]+)[\'"]\s*\)\s*}}'

def rollback_asset_links(file_path):
    try:
        with open(file_path, 'r', encoding='utf-8') as file:
            content = file.read()

            # Replace asset() links
            updated_content = re.sub(asset_regex, lambda match: match.group(1), content)

        with open(file_path, 'w', encoding='utf-8') as file:
            file.write(updated_content)
            print(f"Rolled back file: {file_path}")
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
                rollback_asset_links(file_path)

if __name__ == "__main__":
    process_html_files(html_directory)
