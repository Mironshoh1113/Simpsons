Write-Host "Downloading all missing Simpson character images..." -ForegroundColor Green

# All Simpson character images with reliable URLs
$allImages = @(
    @{name="homer.jpg"; url="https://upload.wikimedia.org/wikipedia/en/0/02/Homer_Simpson_2006.png"},
    @{name="marge.jpg"; url="https://upload.wikimedia.org/wikipedia/en/0/0b/Marge_Simpson.png"},
    @{name="bart.jpg"; url="https://upload.wikimedia.org/wikipedia/en/a/aa/Bart_Simpson_200px.png"},
    @{name="lisa.jpg"; url="https://upload.wikimedia.org/wikipedia/en/e/ec/Lisa_Simpson.png"},
    @{name="maggie.jpg"; url="https://upload.wikimedia.org/wikipedia/en/9/9d/Maggie_Simpson.png"},
    @{name="burns.jpg"; url="https://upload.wikimedia.org/wikipedia/en/5/56/Mr_Burns.png"},
    @{name="smithers.jpg"; url="https://upload.wikimedia.org/wikipedia/en/6/67/Waylon_Smithers_2.png"},
    @{name="carl.jpg"; url="https://upload.wikimedia.org/wikipedia/en/8/84/Carl_Carlson_updated.png"},
    @{name="lenny.jpg"; url="https://upload.wikimedia.org/wikipedia/en/9/95/Lenny_Leonard.png"},
    @{name="ned.jpg"; url="https://upload.wikimedia.org/wikipedia/en/8/84/Ned_Flanders.png"},
    @{name="edna.jpg"; url="https://upload.wikimedia.org/wikipedia/en/7/76/Edna_Krabappel_2.png"},
    @{name="skinner.jpg"; url="https://upload.wikimedia.org/wikipedia/en/3/3a/Seymour_Skinner.png"},
    @{name="wiggum.jpg"; url="https://upload.wikimedia.org/wikipedia/en/5/57/Chief_Wiggum.png"},
    @{name="ralph.jpg"; url="https://upload.wikimedia.org/wikipedia/en/1/14/Ralph_Wiggum.png"},
    @{name="quimby.jpg"; url="https://upload.wikimedia.org/wikipedia/en/8/87/Mayor_Quimby.png"},
    @{name="krusty.jpg"; url="https://upload.wikimedia.org/wikipedia/en/5/5a/Krustytheclown.png"},
    @{name="kent.jpg"; url="https://upload.wikimedia.org/wikipedia/en/7/7c/Kent_Brockman.png"},
    @{name="disco.jpg"; url="https://upload.wikimedia.org/wikipedia/en/8/8c/Disco_Stu.png"},
    @{name="apu.jpg"; url="https://upload.wikimedia.org/wikipedia/en/8/87/Apu_Nahasapeemapetilon.png"},
    @{name="moe.jpg"; url="https://upload.wikimedia.org/wikipedia/en/8/84/Moe_Szyslak.png"},
    @{name="comic.jpg"; url="https://upload.wikimedia.org/wikipedia/en/1/1b/Comic_Book_Guy.png"},
    @{name="hibbert.jpg"; url="https://upload.wikimedia.org/wikipedia/en/5/51/Dr_Hibbert.png"},
    @{name="nick.jpg"; url="https://upload.wikimedia.org/wikipedia/en/e/e1/Dr_Nick_Riviera.png"},
    @{name="duffman.jpg"; url="https://upload.wikimedia.org/wikipedia/en/2/2a/Duffman.png"},
    @{name="otto.jpg"; url="https://upload.wikimedia.org/wikipedia/en/7/74/Otto_Mann.png"}
)

$imageDir = "public/images/characters"

# Create directory if it doesn't exist
if (!(Test-Path $imageDir)) {
    New-Item -ItemType Directory -Path $imageDir -Force
}

$successCount = 0
$failCount = 0

foreach ($img in $allImages) {
    $filename = $img.name
    $url = $img.url
    $filepath = Join-Path $imageDir $filename
    
    # Check if file exists and is small (placeholder)
    $currentSize = 0
    if (Test-Path $filepath) {
        $currentSize = (Get-Item $filepath).Length
    }
    
    if ($currentSize -lt 1000) {
        Write-Host "Downloading $filename..." -ForegroundColor Yellow
        
        try {
            Invoke-WebRequest -Uri $url -OutFile $filepath -UseBasicParsing -TimeoutSec 30
            $newSize = (Get-Item $filepath).Length
            if ($newSize -gt 1000) {
                Write-Host "Successfully downloaded $filename ($newSize bytes)" -ForegroundColor Green
                $successCount++
            } else {
                Write-Host "Failed to download $filename (file too small)" -ForegroundColor Red
                $failCount++
            }
        }
        catch {
            Write-Host "Failed to download $filename" -ForegroundColor Red
            $failCount++
        }
    } else {
        Write-Host "Skipping $filename (already exists and valid)" -ForegroundColor Cyan
    }
}

Write-Host "Download Summary:" -ForegroundColor Green
Write-Host "Successfully downloaded: $successCount" -ForegroundColor Green
Write-Host "Failed downloads: $failCount" -ForegroundColor Red
Write-Host "Download completed!" -ForegroundColor Green 