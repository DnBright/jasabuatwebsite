import glob
import re

css_files = glob.glob('public/build/assets/*.css')
for filepath in css_files:
    content = open(filepath).read()
    
    # 1. Fix vertical-align:middle;display:block on block elements
    # Replace it with display:block to avoid propertyIgnoredDueToDisplay warning
    old_preflight = 'img,svg,video,canvas,audio,iframe,embed,object{vertical-align:middle;display:block}'
    new_preflight = 'img,svg,video,canvas,audio,iframe,embed,object{display:block}'
    
    if old_preflight in content:
        content = content.replace(old_preflight, new_preflight)
        print(f"Fixed preflight warning in {filepath}")
        
    # 2. Fix line-clamp missing standard property in the same rule block
    # Regex to find -webkit-line-clamp:X;-webkit-box-orient:vertical;display:-webkit-box;overflow:hidden
    # and append ;line-clamp:X
    pattern = r'(-webkit-line-clamp:(\d+);-webkit-box-orient:vertical;display:-webkit-box;overflow:hidden)'
    
    def replacer(match):
        full_match = match.group(1)
        val = match.group(2)
        return f"{full_match};line-clamp:{val}"
        
    new_content, count = re.subn(pattern, replacer, content)
    if count > 0:
        content = new_content
        print(f"Fixed {count} line-clamp warnings in {filepath}")
        
    # Write back to file
    with open(filepath, 'w') as f:
        f.write(content)
