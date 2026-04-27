from django.utils.safestring import mark_safe


def format_profile_bio(raw_html: str) -> str:
    return mark_safe(raw_html)
